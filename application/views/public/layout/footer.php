</main>
<style>
    /* Footer Styles based on Event Schedule.png */
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
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .footer-link {
        color: white;
        text-decoration: none;
        font-size: 14px;
        display: block;
        margin-bottom: 8px;
    }
    .footer-link:hover {
        text-decoration: underline;
    }
    
    /* CATATAN FIX: Menambahkan display flex dan gap agar icon membungkus rapi ke bawah jika layar sempit */
    .social-icons-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .social-icons-container a {
        color: white;
        font-size: 16px; /* Dikecilkan dari 20px agar lebih elegan */
        text-decoration: none;
        border: 1px solid rgba(255,255,255,0.5);
        border-radius: 8px;
        padding: 6px 10px; /* Dikecilkan menyesuaikan font */
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
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="<?= base_url('assets/public/images/footer-logo.png') ?>" alt="Ageing Artfully Conference 2026" class="footer-logo">
            </div>
            
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="footer-heading">Enquiries</div>
                        <a href="mailto:secretariat.ageingartfully@slec.org.sg" class="footer-link" style="text-decoration: underline;">
                            secretariat.ageingartfully@slec.org.sg
                        </a>
                    </div>
                    
                    <div class="col-12">
                        <div class="footer-heading">Stay Connected</div>
                        <div class="row">
                            <div class="col-6">
                                <small class="d-block mb-2 text-white-50">@stlukeseldercare</small>
                                <div class="social-icons-container">
                                    <a href="https://www.instagram.com/stlukeseldercare/?hl=en"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.facebook.com/StLukesElderCare/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.tiktok.com/@stlukeseldercare"><i class="fab fa-tiktok"></i></a>
                                    <a href="https://www.linkedin.com/company/st-lukes-eldercare/"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <div class="col-6">
                                <small class="d-block mb-2 text-white-50">@nafa_sg</small>
                                <div class="social-icons-container">
                                    <a href="https://www.instagram.com/nafa_sg/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.facebook.com/NAFA"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.tiktok.com/@nafa_sg"><i class="fab fa-tiktok"></i></a>
                                    <a href="https://www.linkedin.com/school/nafasg/"><i class="fab fa-linkedin-in"></i></a>
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