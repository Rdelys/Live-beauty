<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin — Particules</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html,body{
      height:100%;
      margin:0;
      font-family:Inter,system-ui,Arial;
      background:#02020a;
      color:#fff;
    }

    #bgcanvas{
      position:fixed;
      inset:0;
      z-index:0;
    }

    /* CENTRAGE PARFAIT */
    .center-wrap{
      position:relative;
      z-index:5;
      height:100vh;
      width:100%;
      display:flex;
      justify-content:center;
      align-items:center;
      padding:20px;
    }

    .panel{
      width:100%;
      max-width:420px;
      background:rgba(255,255,255,0.04);
      padding:30px;
      border-radius:12px;
      backdrop-filter:blur(8px);
      border:1px solid rgba(255,255,255,0.06);
    }

    .title{
      display:flex; 
      align-items:center; 
      gap:12px; 
      margin-bottom:18px;
    }

    .dot{
      width:44px;
      height:44px;
      border-radius:10px;
      background:linear-gradient(45deg,#ff6b9a,#7b61ff);
      display:grid;
      place-items:center;
    }

    label{font-weight:600}

    .form-control{
      background:transparent;
      border:1px solid rgba(255,255,255,0.06);
      color:#fff;
      height:46px;
      border-radius:10px;
    }

    .btn{
      background:linear-gradient(90deg,#ff6b9a,#7b61ff);
      border:none;
      height:48px;
      border-radius:10px;
    }
  </style>
</head>
<body>
  <canvas id="bgcanvas"></canvas>

  <div class="center-wrap">
    <div class="panel">

      <div class="title">
        <div class="dot">A</div>
        <div>
          <div style="font-weight:800; font-size:1.2rem">Admin Panel</div>
          <div style="opacity:0.75; font-size:0.9rem">Connexion sécurisée</div>
        </div>
      </div>

      <form method="POST" action="{{ route('admin.login.submit') }}">@csrf
        <div class="mb-3">
          <label class="form-label">Identifiant</label>
          <input class="form-control" name="username" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Mot de passe</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <button class="btn w-100">Se connecter</button>
      </form>

    </div>
  </div>

  <script>
    const canvas = document.getElementById('bgcanvas');
    const ctx = canvas.getContext('2d');
    let W, H, particles=[];
    function resize(){W=canvas.width=innerWidth; H=canvas.height=innerHeight}
    window.addEventListener('resize', resize); resize();

    function rand(min,max){return Math.random()*(max-min)+min}
    class P{
      constructor(){this.x=rand(0,W);this.y=rand(0,H);this.vx=rand(-0.2,0.2);this.vy=rand(-0.2,0.2);this.r=rand(0.6,1.8);this.alpha=rand(0.2,0.95)}
      step(){this.x+=this.vx; this.y+=this.vy; if(this.x<0)this.x=W; if(this.x>W)this.x=0; if(this.y<0)this.y=H; if(this.y>H)this.y=0}
      draw(){ctx.beginPath(); ctx.globalAlpha=this.alpha; ctx.fillStyle='#fff'; ctx.arc(this.x,this.y,this.r,0,Math.PI*2); ctx.fill();}
    }

    for(let i=0;i<120;i++)particles.push(new P());

    function loop(){
      ctx.clearRect(0,0,W,H);
      const g=ctx.createLinearGradient(0,0,W,H); 
      g.addColorStop(0,'#050014'); 
      g.addColorStop(1,'#00103a'); 
      ctx.fillStyle=g; 
      ctx.fillRect(0,0,W,H);

      for(let p of particles){p.step(); p.draw();}

      for(let i=0;i<particles.length;i++){
        for(let j=i+1;j<particles.length;j++){
          const a=particles[i], b=particles[j]; 
          const dx=a.x-b.x, dy=a.y-b.y; 
          const d=dx*dx+dy*dy; 
          if(d<12000){
            ctx.beginPath(); 
            ctx.globalAlpha=0.08; 
            ctx.moveTo(a.x,a.y); 
            ctx.lineTo(b.x,b.y); 
            ctx.strokeStyle='#9be6ff'; 
            ctx.stroke()
          }
        }
      }
      requestAnimationFrame(loop);
    }
    loop();
  </script>
</body>
</html>
