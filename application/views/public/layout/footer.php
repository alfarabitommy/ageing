</main>
<style>
    /* Footer Styles based on Event Schedule.png & Client Feedback */
    .site-footer {
        background-color: #5156B8; /* Navy/Purple color from design */
        color: white;
        padding: 60px 0;
        margin-top: 80px;
    }
    .footer-logo {
        max-width: 250px;
        margin-bottom: 20px;
    }
    
    .footer-heading {
        font-size: 18px; 
        font-weight: 700;
        margin-bottom: 8px; 
    }
    
    .footer-link {
        color: white;
        text-decoration: none;
        font-size: 16px; 
        display: block;
        margin-bottom: 8px;
        /* Tambahan agar email panjang bisa turun ke bawah di layar sempit/tablet */
        word-break: break-word; 
    }
    .footer-link:hover {
        text-decoration: underline;
    }
    
    .social-handle {
        font-size: 16px; 
        display: block;
        margin-bottom: 8px; 
        color: rgba(255,255,255,0.7);
    }
    
    .social-icons-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .social-icons-container a {
        color: white;
        font-size: 18px; 
        text-decoration: none;
        border: 1px solid rgba(255,255,255,0.5);
        border-radius: 8px;
        padding: 8px 12px; 
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }
    .social-icons-container a:hover {
        background-color: white;
        color: #5156B8;
    }
</style>

<footer class="site-footer">
    <div class="container">
        <div class="row align-items-start">
            
            <!-- Kolom Logo: Diperkecil menjadi col-lg-4 agar area teks lebih luas -->
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="<?= base_url('assets/public/images/footer-logo.png') ?>" alt="Ageing Artfully Conference 2026" class="footer-logo">
            </div>
            
            <!-- Kolom Informasi (Enquiries & Sosmed): Diperlebar menjadi col-lg-8 -->
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    
                    <!-- PERBAIKAN: Diubah ke col-md-6 dan ditambah padding (pe-lg-5) untuk jarak aman -->
                    <div class="col-md-6 mb-4 mb-md-0 pe-lg-5">
                        <div class="footer-heading">Enquiries</div>
                        <a href="mailto:secretariat.ageingartfully@slec.org.sg" class="footer-link" style="text-decoration: underline;">
                            secretariat.ageingartfully@slec.org.sg
                        </a>
                    </div>
                    
                    <!-- PERBAIKAN: Diubah ke col-md-6 agar seimbang (50/50) dengan Enquiries -->
                    <div class="col-md-6">
                        <div class="footer-heading">Stay Connected</div>
                        <div class="row">
                            <div class="col-6">
                                <span class="social-handle">@stlukeseldercare</span>
                                <div class="social-icons-container">
                                    <a href="https://www.instagram.com/stlukeseldercare/?hl=en" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.facebook.com/StLukesElderCare/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.tiktok.com/@stlukeseldercare" target="_blank" rel="noopener noreferrer"><i class="fab fa-tiktok"></i></a>
                                    <a href="https://www.linkedin.com/company/st-lukes-eldercare/" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <div class="col-6">
                                <span class="social-handle">@nafa_sg</span>
                                <div class="social-icons-container">
                                    <a href="https://www.instagram.com/nafa_sg/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.facebook.com/NAFA" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.tiktok.com/@nafa_sg" target="_blank" rel="noopener noreferrer"><i class="fab fa-tiktok"></i></a>
                                    <a href="https://www.linkedin.com/school/nafasg/" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>