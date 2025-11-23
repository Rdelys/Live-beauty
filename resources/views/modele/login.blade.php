<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion Modèle | Live Beauty</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap & Fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      color: #222;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #000;   /* Fallback */
      overflow: hidden;
    }

    /* Canvas fond animé */
    #bgcanvas {
      position: fixed;
      inset: 0;
      z-index: 0;
    }

    .container-login {
      display: flex;
      flex-wrap: wrap;
      width: 90%;
      max-width: 1000px;
      background: #ffffffcc;
      backdrop-filter: blur(10px);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 40px rgba(255,0,60,0.25);
      z-index: 5;
      position: relative;
    }

    /* Section gauche */
    .login-left {
      flex: 1;
      background: linear-gradient(135deg, #1a001a, #330033);
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 60px;
    }

    .login-left h2 {
      font-weight: 600;
      font-size: 1.9rem;
      margin-bottom: 15px;
      text-shadow: 0 0 10px #ff3b93;
    }

    .login-left p {
      font-size: 1rem;
      color: #ddd;
      line-height: 1.6;
      margin-bottom: 25px;
    }

    .feature {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      color: #fff;
      font-size: 0.95rem;
    }

    .feature i {
      font-size: 1.2rem;
      color: #ff147a;
      margin-right: 10px;
      text-shadow: 0 0 6px #ff3b93;
    }

    /* Section droite */
    .login-right {
      flex: 1;
      padding: 60px 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: #fff;
    }

    .login-right h3 {
      font-weight: 600;
      text-align: center;
      color: #000;
      margin-bottom: 30px;
    }

    .form-label {
      color: #333;
      font-weight: 500;
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #ccc;
      padding: 12px;
      transition: 0.3s;
    }

    .form-control:focus {
      border-color: #ff147a;
      box-shadow: 0 0 10px rgba(255, 20, 122, 0.4);
    }

    .btn-custom {
      background: linear-gradient(90deg,#ff147a,#ff0077);
      border: none;
      border-radius: 10px;
      padding: 12px;
      font-weight: 600;
      color: #fff;
      text-transform: uppercase;
      transition: 0.3s;
      margin-top: 10px;
      box-shadow: 0 5px 12px rgba(255,0,100,0.25);
    }

    .btn-custom:hover {
      transform: translateY(-2px);
      box-shadow: 0 7px 18px rgba(255,0,120,0.4);
    }

    .text-link {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #444;
      font-size: 0.9rem;
      transition: 0.3s;
    }

    .text-link:hover {
      color: #ff147a;
      text-decoration: none;
    }

    @media (max-width: 768px) {
      .container-login {
        flex-direction: column;
      }
      .login-left {
        text-align: center;
        padding: 40px 30px;
      }
      .login-right {
        padding: 40px 25px;
      }
    }
  </style>
</head>
<body>

<canvas id="bgcanvas"></canvas>

  <div class="container-login">
    
    <!-- Colonne gauche -->
    <div class="login-left">
      <h2><i class="fa-solid fa-kiss-wink-heart me-2"></i>Connexion à votre espace</h2>
      <p>Bienvenue sur <strong>Live Beauty</strong>. Connectez-vous pour accéder à votre espace modèle et gérer vos contenus.</p>
      
      <div class="feature"><i class="fa-solid fa-star"></i>Suivi des revenus en temps réel</div>
      <div class="feature"><i class="fa-solid fa-photo-film"></i>Gestion photo & vidéo</div>
      <div class="feature"><i class="fa-solid fa-video"></i>Lives publics et privés</div>
    </div>

    <!-- Colonne droite -->
    <div class="login-right">
      <h3><i class="fa-solid fa-lock me-2 text-danger"></i>Connexion Modèle</h3>

      <form action="{{ route('modele.login.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label"><i class="fa-solid fa-envelope me-2 text-danger"></i>Email</label>
          <input type="email" name="email" class="form-control" placeholder="Entrez votre email" required>
        </div>

        <div class="mb-3">
          <label class="form-label"><i class="fa-solid fa-key me-2 text-danger"></i>Mot de passe</label>
          <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>
        </div>

        <button type="submit" class="btn btn-custom w-100">Se connecter</button>

        <a class="text-link" href="{{ route('modele.password.request') }}">Mot de passe oublié ?</a>
      </form>
    </div>
  </div>


<script>
/* ---- Animation fluide d’icônes Font Awesome ---- */
const canvas = document.getElementById("bgcanvas");
const ctx = canvas.getContext("2d");

let W, H;
let iconsArray = [];

/* Icônes glamour (FA) */
const icons = [
  "\uf004", // cœur
  "\uf0d6", // argent
  "\uf005", // star
  "\uf3a5", // lipstick
  "\uf553", // high heels
  "\uf3a6", // kiss
  "\uf0a0", // diamant
  "\uf290", // sac à main
  "\uf182"  // robe
];

function resize() {
  W = canvas.width = window.innerWidth;
  H = canvas.height = window.innerHeight;
}
window.addEventListener("resize", resize);
resize();

class FloatingIcon {
  constructor() {
    this.reset();
  }
  reset() {
    this.x = Math.random() * W;
    this.y = Math.random() * H;
    this.size = 26 + Math.random() * 44;
    this.speed = 0.2 + Math.random() * 0.5;
    this.angle = Math.random() * 360;
    this.spin = (Math.random() - 0.5) * 0.4;
    this.alpha = 0.2 + Math.random() * 0.6;
    this.icon = icons[Math.floor(Math.random() * icons.length)];
    this.color = `rgba(255, ${50 + Math.random()*50}, ${150 + Math.random()*100}, ${this.alpha})`;
  }
  update() {
    this.y -= this.speed;
    this.angle += this.spin;

    if (this.y < -60) this.reset();
  }
  draw() {
    ctx.save();
    ctx.translate(this.x, this.y);
    ctx.rotate(this.angle * Math.PI / 180);
    ctx.font = `${this.size}px "Font Awesome 6 Free"`;
    ctx.fillStyle = this.color;
    ctx.shadowColor = "rgba(255,0,150,0.6)";
    ctx.shadowBlur = 12;
    ctx.fillText(this.icon, 0, 0);
    ctx.restore();
  }
}

/* Densité des icônes */
for (let i = 0; i < 60; i++) {
  iconsArray.push(new FloatingIcon());
}

function animate() {
  ctx.clearRect(0, 0, W, H);

  // Fond futuriste
  const gradient = ctx.createLinearGradient(0,0,W,H);
  gradient.addColorStop(0,"#120013");
  gradient.addColorStop(1,"#00001a");
  ctx.fillStyle = gradient;
  ctx.fillRect(0,0,W,H);

  // Animation douce
  iconsArray.forEach(icon => {
    icon.update();
    icon.draw();
  });

  requestAnimationFrame(animate);
}
animate();
</script>


</body>
</html>
