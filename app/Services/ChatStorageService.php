<?php
// app/Services/ChatStorageService.php

namespace App\Services;

use App\Models\ChatMessage;
use Illuminate\Support\Facades\DB;

class ChatStorageService
{
    /**
     * Stocke un message client
     */
    public static function storeClientMessage($userId, $pseudo, $message)
    {
        return ChatMessage::create([
            'user_id' => $userId,
            'pseudo' => $pseudo,
            'message' => $message,
            'sender' => 'client',
            'read' => false,
            'replied' => false
        ]);
    }

    /**
     * Stocke une réponse admin
     */
    public static function storeAdminReply($userId, $message)
    {
        return ChatMessage::create([
            'user_id' => $userId,
            'pseudo' => 'Admin',
            'message' => $message,
            'sender' => 'admin',
            'read' => true,
            'replied' => true,
            'read_at' => now()
        ]);
    }

    /**
     * Récupère les messages non lus d'un utilisateur
     */
    public static function getUnreadMessages($userId)
    {
        return ChatMessage::where('user_id', $userId)
            ->where('read', false)
            ->where('sender', 'client')
            ->orderBy('created_at')
            ->get();
    }

    /**
     * Marque les messages comme lus
     */
    public static function markMessagesAsRead($userId)
    {
        return ChatMessage::where('user_id', $userId)
            ->where('read', false)
            ->where('sender', 'client')
            ->update([
                'read' => true,
                'read_at' => now()
            ]);
    }

    /**
     * Récupère tous les messages pour l'admin
     */
    public static function getAllMessagesForAdmin()
    {
        return ChatMessage::with('user')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('user_id');
    }

    /**
     * Récupère l'historique d'un utilisateur
     */
    public static function getUserHistory($userId)
    {
        return ChatMessage::where('user_id', $userId)
            ->orderBy('created_at')
            ->get();
    }

    /**
     * Récupère les messages non lus (tous utilisateurs)
     */
    public static function getUnreadMessagesForAdmin()
    {
        return ChatMessage::where('read', false)
            ->where('sender', 'client')
            ->orderBy('created_at')
            ->get();
    }

    /**
     * Vérifie si l'admin a des messages non lus
     */
    public static function hasUnreadMessages()
    {
        return ChatMessage::where('read', false)
            ->where('sender', 'client')
            ->exists();
    }

    /**
     * Compte les messages non lus
     */
    public static function countUnreadMessages()
    {
        return ChatMessage::where('read', false)
            ->where('sender', 'client')
            ->count();
    }

    /**
     * Récupère les messages groupés par utilisateur
     */
    public static function getMessagesGroupedByUser()
    {
        return ChatMessage::select('user_id', 'pseudo', DB::raw('MAX(created_at) as last_message'))
            ->where('sender', 'client')
            ->where('read', false)
            ->groupBy('user_id', 'pseudo')
            ->orderBy('last_message', 'desc')
            ->get();
    }

    /**
     * Récupère les derniers messages d'un utilisateur
     */
    public static function getLastMessagesByUser($userId, $limit = 10)
    {
        return ChatMessage::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get()
            ->reverse()
            ->values();
    }

    /**
     * Supprime les vieux messages (plus de 30 jours)
     */
    public static function cleanupOldMessages($days = 30)
    {
        $date = now()->subDays($days);
        return ChatMessage::where('created_at', '<', $date)
            ->delete();
    }
}