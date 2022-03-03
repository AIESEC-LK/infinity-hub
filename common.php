<?php
function renderNavbar($index_active, $about_active, $conf_active, $fk_active, $contact_active)
{
    echo('
    <nav class="navbar navbar-expand-lg nav-section">
    <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" style="height: 30px; padding-left: 30px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars" style="color:#f6783a" aria-hidden="true"></i>
    </button>
    <div  class="collapse navbar-collapse" id="navbarSupportedContent" >

        <ul class="main-menu">
            <li class=' . $index_active . '><a href="index.php">Home</a></li>
            <li class="nav-item dropdown '.$about_active. '">
                <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">About Us</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #020031">
                    <a class="dropdown-item" href="about.php">Who We Are</a>
                    <a class="dropdown-item" href="aiesecway.php">AIESEC Way</a>
                    <a class="dropdown-item" href="roadmap.php">Roadmap</a>
                </div>
            </li>

            <li class='.$conf_active.'><a href="conference.php">Conferences & Output</a></li>
            <li class='.$fk_active. '><a href="functional-knowledge.php">Functional Knowledge</a></li>
            <li class="nav-item dropdown ' .$contact_active. '">
                <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Contact Us</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #020031">
                    <a class="dropdown-item" href="contact.php">Meet the Team</a>
                    <a class="dropdown-item" href="channels.php">Our Channels</a>
                </div>
            </li>
        </ul>
    </div>
    </nav>'
    );
}
function renderFooter(){
    echo('<footer class="footer-section">
    <div class="container footer-top">
        <div class="row">
            <div class="col footer-widget">
                <div class="about-widget">
                    <a href="index.php" class="site-logo"><img src="img/ablue.png" align="center"
                                                               style="width:180px;height:24px;" alt=""></a>
                    <p>AIESEC is a non-governmental not-for-profit organization in consultative status with the United
                        Nations Economic and Social Council (ECOSOC), affiliated with the UN DPI, member of ICMYO, and
                        is recognized by UNESCO. AIESEC International Inc. is registered as a Not-for-profit
                        Organisation under the Canadian Not-for-profit Corporations Act – 2018-02-08, Corporation
                        Number: 1055154-6 and Quebec Business Number (NEQ) 1173457178 in Montreal, Quebec, Canada.©
                        AIESEC 2019 Privacy Policy</p>
                    <div class="social pt-1">
                        <a href="https://twitter.com/aieseclk"><i class="fa fa-twitter-square"></i></a>
                        <a href="https://www.facebook.com/AIESECLK/"><i class="fa fa-facebook-square"></i></a>
                        <a href="https://www.instagram.com/aiesecsrilanka/"><i class="fa fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/aieseclk"><i class="fa fa-linkedin-square"></i></a>
                        <a href="https://www.youtube.com/c/AIESECSriLanka"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>       
        </div>
        <div class="copyright">
            <div class="container">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
    All rights reserved</a>
            </div>
        </div>
</footer>');
}