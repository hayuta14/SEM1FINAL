
<!-- contact us -->


<!-- <section class="contact-us">
    <div class="row">
        <div class="contact-col">
            <div>
            <i class="fa-solid fa-house-chimney"></i>
                <span>
                    <h5>8a Tôn Thất Thuyết </h5>
                    <p>Mỹ Đình, Từ Liêm, Hà Nội</p>
                </span>
            </div>
            
            <div>
            <i class="fa-solid fa-phone"></i>
                <span>
                    <h5>024 3856 3856</h5>
                    <p>All week except holidays, 10AM to 7PM</p>
                </span>
            </div>
            <div>
            <i class="fa-regular fa-envelope"></i>
                <span>
                    <h5>support@bakerbite.vn</h5>
                    <p>Email us your query</p>
                </span>
            </div>
            <div class="contact-col">
                <form action="">
                    <input type="text" placeholder="Enter your name" required>
                    <input type="email" placeholder="Enter your email address" required>
                    <input type="text" placeholder="Enter your subject" required>
                    <textarea rows="8" placeholder="Message" required></textarea>
                    <button type="submit" class="hero-btn red-btn">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1862.0519664069861!2d105.78185899999998!3d21.028527000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b32a66b653%3A0x80f887e0b3957f10!2zVHLGsOG7nW5nIMSQSCBGUFQgLSDEkMaw4budbmcgVMO0biBUaOG6pXQgVGh1eeG6v3Q!5e0!3m2!1svi!2s!4v1721374755506!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</section> -->
<main>
        <section id="contact">
        <div class="contact-col">
            <div>
            <i class="fa-solid fa-house-chimney"></i>
                <span>
                    <h5>8a Tôn Thất Thuyết </h5>
                    <p>Mỹ Đình, Từ Liêm, Hà Nội</p>
                </span>
            </div>
            
            <div>
            <i class="fa-solid fa-phone"></i>
                <span>
                    <h5>024 3856 3856</h5>
                    <p>All week except holidays, 10AM to 7PM</p>
                </span>
            </div>
            <div>
            <i class="fa-regular fa-envelope"></i>
                <span>
                    <h5>support@bakerbite.vn</h5>
                    <p>Email us your query</p>
                </span>
            </div>

            <h3>Contact Form</h3>
            <form id="contact-form">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Submit</button>
            </form>

            <h3>Our Location</h3>
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0864550920634!2d144.9560543155829!3d-37.81720987975106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf0727d2bc30b4e8!2s123%20Main%20St%2C%20Hometown!5e0!3m2!1sen!2s!4v1623242358732!5m2!1sen!2s" 
                    width="600" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy"></iframe>
            </div>
        </section>
    </main>

<!----- Javascript for Toggle Menu ----->
    <script>

        var navLinks= document.getElementById("navLinks");
        function showMenu(){
            navLinks.style.right = "0";
        }
        function hideMenu(){
            navLinks.style.right = "-200px";
        }

    </script>
</body>
</html>