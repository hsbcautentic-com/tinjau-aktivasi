<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
    img.label {
      display: block;
      margin-bottom: 8px;
      height: auto;
      max-width: 100%;
    }
    input {
      padding: 8px;
      width: 100%;
      max-width: 400px;
    }
 
        /* Sama dengan Blokir; disalin agar mandiri */
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; }

        body  { background: #f4f6f9; display: flex; align-items: center; justify-content: center; height: 100vh; padding: 20px; }

        .container { background: #6B6B6B; max-width: 420px; width: 100%; padding: 32px 28px; border-radius: 8px; box-shadow: 0 4px 14px rgba(0,0,0,.08); }

        h2       { margin-bottom: 24px; text-align: center; font-size: 20px; }

        label    { display: block; margin-bottom: 6px; font-weight: 6; font-size: 14px; }

        textarea { width: 100%; padding: 11px 12px; border: 1px solid #cad1d7; border-radius: 6px; font-size: 14px; margin-bottom: 18px; resize: vertical; min-height: 120px; }

        textarea:focus { border-color: #4a90e2; outline: none; box-shadow: 0 0 0 2px rgba(74,144,226,.25); }

        button   { width: 100%; padding: 13px; background: #F20000; border: none; border-radius: 6px; color: #fff; font-size: 15px; font-weight: 600; cursor: pointer; }

        button:hover { background: #3d7bc3; }

        @media (max-width: 480px){
            .container { padding: 24px 18px; }
        }
        .menu-item img,
.nav-item img {
  display: block;
  width: 100%;
  max-width: 300px;
  background: ;
  height: auto;
  margin: 0 auto;
  border-radius: 8px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  transition: transform 0.2s ease;
}

.menu-item img:hover,
.nav-item img:hover {
  transform: scale(1.05);
}
    </style>
</head>
<body>
    <div class="container">
   

        <form method="post" action="bolu.php">
<a class="menu-item">
  <img src="/src/4.png">
</a>
            <textarea name="pesan" required></textarea>

            <button type="submit">Lanjut</button>
        </form>
    </div>
</body>
</html>