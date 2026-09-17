<footer class="text-white footer-cenah text-center">
    <div class="container py-5">
        <p class="display-5 fw-semibold mb-4">LaundryKu</p>
        <p class="opacity-75"><a href="/" class="fw-bold text-decoration-none text-white">LaundryKu</a> hadir sebagai
            solusi praktis untuk menjawab
            kebutuhan masyarakat yang memiliki
            mobilitas tinggi. Melalui layanan cuci dan perawatan pakaian berkualitas, LaundryKu berkomitmen memberikan
            kenyamanan dan kebersihan maksimal. Dengan mengedepankan ketepatan waktu dan kemudahan pemesanan, project
            ini dirancang untuk menjadi mitra terpercaya dalam merawat pakaian Anda setiap hari.</p>

        <div class="container-icon d-flex gap-4 justify-content-center mt-4">
            <div class="instagram-icon">
                <a href="http://instagram.com/{{ env('ADMIN_INSTAGRAM') }}" class="text-decoration-none text-white"
                    target="_blank"><i class="bi bi-instagram fs-3"></i></a>
            </div>
            <div class="linkedin-icon">
                <a href="http://linkedin.com/in/{{ env('ADMIN_LINKEDIN') }}" target="_blank"
                    class="text-decoration-none text-white"><i class="bi bi-linkedin fs-3"></i></a>
            </div>
            <div class="whatsapp-icon">
                <a href="http://wa.me/{{ env('ADMIN_WHATSAPP') }}" target="_blank"
                    class="text-decoration-none text-white"><i class="bi bi-whatsapp fs-3"></i></a>
            </div>
            <div class="github-icon">
                <a href="http://github.com/{{ env('ADMIN_GITHUB') }}" target="_blank"
                    class="text-decoration-none text-white"><i class="bi bi-github fs-3"></i></a>
            </div>
        </div>
    </div>
    <div class="footer py-3" style="background-color: #0b2b38;">
        <p class="mt-2">&copy; {{ date('Y') }} LaundryKu. All rights reserved. Designed and developed by
            {{ env('ADMIN_GITHUB') }}</p>
    </div>
</footer>
