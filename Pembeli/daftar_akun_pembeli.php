<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "rbpl");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$show_modal = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['proses_daftar'])) {
    $user = mysqli_real_escape_string($conn, $_POST['identifier']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $cek = mysqli_query($conn, "SELECT * FROM pembeli WHERE identifier = '$user'");

    if (mysqli_num_rows($cek) > 0) {
        $error_msg = "Akun sudah terdaftar!";
    } else {
        $sql = "INSERT INTO pembeli (identifier, password) VALUES ('$user', '$password')";
        if (mysqli_query($conn, $sql)) {
            $show_modal = true;
        } else {
            $error_msg = "Terjadi kesalahan: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Shopee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&family=Poppins:wght@400;500;600;700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        shopee: '#EE4D2D',
                        facebook: '#1877F2',
                        line: '#00C300',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                        montserrat: ['Montserrat', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .app-container {
            width: 390px;
            height: 100vh;
            background-color: #FFFFFF;
            border-radius: 32px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            position: relative;
            display: flex;
            flex-direction: column;
            max-width: 100vw;
            overflow: hidden;
        }

        .scroll-content::-webkit-scrollbar {
            display: none;
        }

        .scroll-content {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        input:focus {
            outline: none;
            border-bottom: 1px solid #EE4D2D;
        }

        .modal-animate {
            animation: modalIn 0.3s ease-out forwards;
        }

        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>

<body>

    <div class="app-container">

        <div class="flex-none flex items-center px-4 py-3 border-b border-gray-100 mt-6 bg-white z-10">
            <button onclick="history.back()" class="p-2">
                <svg class="w-6 h-6 text-shopee" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <h1 class="flex-1 text-center font-poppins font-bold text-lg pr-8">Daftar</h1>
            <button class="p-2 absolute right-4 text-shopee/40">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                </svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto scroll-content">

            <div class="flex justify-center py-8">
                <div class="w-30 h-30 rounded-2xl flex items-center justify-center">
                    <img src="assets/shopee-logo.png" alt="Icon" class="w-16 h-16 object-contain">
                </div>
            </div>

            <form action="" method="POST" class="px-8 space-y-6">
                <div class="relative flex items-center border-b border-gray-200 py-2">
                    <div class="w-6 h-6 bg-neutral-400 rounded-sm flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                    <input type="text" name="identifier" placeholder="No. Handphone/Email/Username" required class="w-full text-xs font-montserrat placeholder-neutral-300 py-1 bg-transparent">
                </div>

                <div class="relative flex items-center border-b border-gray-200 py-2">
                    <div class="w-6 h-6 flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0110 0v4"></path>
                        </svg>
                    </div>
                    <input type="password" name="password" placeholder="Password" required class="w-full text-xs font-montserrat placeholder-neutral-300 py-1 bg-transparent">
                    <div class="flex items-center gap-2 ml-2">
                        <button type="button" class="text-zinc-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                        <div class="w-[1px] h-4 bg-gray-200"></div>
                        <button type="button" class="text-slate-500 text-xs font-bold font-montserrat whitespace-nowrap">Lupa?</button>
                    </div>
                </div>

                <?php if (isset($error_msg)): ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '<?php echo $error_msg; ?>',
                            confirmButtonColor: '#EE4D2D'
                        });
                    </script>
                <?php endif; ?>

                <button type="submit" name="proses_daftar"
                    class="w-full h-12 bg-gray-200 rounded-md text-zinc-600 font-bold font-montserrat text-base flex items-center justify-center hover:bg-[#FF5C35] hover:text-white transition-all duration-200">
                    Daftar
                </button>

                <div class="flex justify-between px-1">
                    <a href="login_pembeli.php" class="text-slate-500 text-[10px] font-bold font-montserrat">Sudah Punya Akun?</a>
                    <a href="login_pembeli.php" class="text-slate-500 text-[10px] font-bold font-montserrat">Login</a>
                </div>
            </form>

            <div class="flex items-center px-8 my-8">
                <div class="flex-1 h-[1px] bg-gray-200"></div>
                <span class="px-3 text-zinc-400 text-[10px] font-bold font-montserrat tracking-widest uppercase">Atau</span>
                <div class="flex-1 h-[1px] bg-gray-200"></div>
            </div>

            <div class="px-8 space-y-3 pb-12">
                <button class="w-full h-11 flex items-center bg-blue-500 text-white rounded-sm overflow-hidden">
                    <div class="w-10 h-10 bg-white m-0.5 rounded-sm flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" />
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                        </svg>
                    </div>
                    <span class="flex-1 text-center text-xs font-montserrat">Lanjutkan dengan Google</span>
                </button>

                <button class="w-full h-11 flex items-center bg-facebook text-white rounded-sm overflow-hidden">
                    <div class="w-10 h-10 bg-white m-0.5 rounded-sm flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-facebook" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </div>
                    <span class="flex-1 text-center text-xs font-montserrat">Lanjutkan dengan Facebook</span>
                </button>

                <button class="w-full h-11 flex items-center bg-black text-white rounded-sm overflow-hidden">
                    <div class="w-10 h-10 bg-white m-0.5 rounded-sm flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.05 20.28c-.98.95-2.05 1.61-3.22 1.61-1.14 0-1.52-.67-2.88-.67-1.37 0-1.78.65-2.85.67-1.15.02-2.12-.58-3.13-1.58C2.92 18.3 1.39 14.51 1.39 11.1c0-5.5 3.51-8.5 6.89-8.5 1.7 0 3.1.92 4.14.92 1.05 0 2.53-.94 4.5-.94 1.38 0 3.03.62 4.07 1.82-2.83 1.67-2.37 5.56.51 6.86-1.14 2.82-2.58 5.61-4.45 7.42l.0001.0001zM12.03 4.12c-.03-2.34 1.95-4.33 4.23-4.12.24 2.63-2.5 4.79-4.23 4.12z" />
                        </svg>
                    </div>
                    <span class="flex-1 text-center text-xs font-montserrat">Lanjutkan dengan Apple</span>
                </button>

                <button class="w-full h-11 flex items-center bg-line text-white rounded-sm overflow-hidden">
                    <div class="w-10 h-10 bg-white m-0.5 rounded-sm flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7 text-line" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 10.304c0-5.369-5.383-9.738-12-9.738-6.616 0-12 4.369-12 9.738 0 4.814 4.269 8.846 10.036 9.608.391.084.922.258 1.057.592.121.303.079.778.039 1.085l-.171 1.027c-.052.303-.242 1.186 1.039.647 1.281-.54 6.911-4.069 9.428-6.967 1.739-1.907 2.572-3.893 2.572-5.992zm-15.088 3.518h-2.314v-5.636c0-.154.125-.28.28-.28h.581c.155 0 .28.125.28.28v4.796h1.173c.155 0 .28.125.28.28v.581c0 .153-.125.279-.28.279zm2.748 0h-.58c-.156 0-.281-.125-.281-.28v-5.636c0-.154.125-.28.281-.28h.58c.155 0 .28.125.28.28v5.636c0 .155-.125.28-.28.28zm4.493 0h-.58c-.156 0-.28-.125-.28-.28v-4.041l-1.948 2.525c-.066.084-.165.134-.271.134h-.01c-.105 0-.204-.049-.27-.133l-1.947-2.525v4.04c0 .155-.125.28-.281.28h-.58c-.155 0-.28-.125-.28-.28v-5.636c0-.154.125-.28.28-.28h.569c.119 0 .23.057.299.155l1.986 2.575 1.987-2.575c.068-.098.179-.155.299-.155h.568c.155 0 .28.125.28.28v5.636c0 .155-.125.28-.28.28zm3.628-1.745c0 .155-.125.28-.28.28h-1.442v1.186h1.442c.155 0 .28.125.28.28v.581c0 .154-.125.279-.28.279h-2.302c-.155 0-.281-.125-.281-.28v-5.636c0-.154.126-.28.281-.28h2.302c.155 0 .28.125.28.28v.581c0 .155-.125.28-.28.28h-1.442v1.173h1.442c.155 0 .28.125.28.28v.581z" />
                        </svg>
                    </div>
                    <span class="flex-1 text-center text-xs font-montserrat tracking-tight">Lanjutkan dengan Line</span>
                </button>

                <p class="text-[10px] text-center font-montserrat text-gray-500 leading-relaxed px-2">
                    Dengan mendaftar, Anda setuju dengan
                    <span class="text-black font-semibold">Syarat & Ketentuan</span>
                    &
                    <span class="text-blue-500 font-semibold">Kebijakan Shopee</span>
                </p>
            </div>

        </div>

    </div>

    <div id="successModal" class="fixed inset-0 bg-black/60 z-[100] <?php echo $show_modal ? 'flex' : 'hidden'; ?> items-center justify-center p-6 backdrop-blur-sm">
        <div class="bg-white rounded-[30px] p-8 w-full max-w-[320px] text-center shadow-2xl modal-animate">
            <div class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
                <i class="fas fa-check-double"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-800 mb-2 font-montserrat">Pendaftaran Berhasil!</h3>
            <p class="text-gray-500 text-sm mb-8 font-poppins">Akun kamu telah berhasil dibuat. Silakan login untuk melanjutkan.</p>
            <button onclick="window.location.href='login_pembeli.php'"
                class="w-full py-4 bg-shopee text-white rounded-xl font-bold font-montserrat hover:bg-red-600 transition-colors">
                OK, Lanjut Login
            </button>
        </div>
    </div>

    <script>
        function updateClock() {
            const now = new Date();
            const timeStr = String(now.getHours()).padStart(2, '0') + ':' +
                String(now.getMinutes()).padStart(2, '0');
            const clockElement = document.getElementById('clock');
            if (clockElement) clockElement.innerText = timeStr;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>

</body>

</html>