<x-layout :title="$title">
    <div class="page-intro page-intro-green">
        <h1 class="intro-title">Contact Us</h1>
        <p class="intro-subtitle">We'd love to hear from you</p>
    </div>

    <div class="contact-grid">
        <div class="contact-form-wrapper">
            <h2 class="form-title">Send us a message</h2>
            <form class="contact-form">
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea rows="4" class="form-textarea"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-full">Send Message</button>
            </form>
        </div>

        <div class="contact-info">
            <div class="contact-card">
                <div class="contact-icon contact-icon-green">📧</div>
                <div>
                    <h3 class="contact-title">Email</h3>
                    <p class="contact-text">contact@jobboard.com</p>
                </div>
            </div>

            <div class="contact-card">
                <div class="contact-icon contact-icon-blue">📞</div>
                <div>
                    <h3 class="contact-title">Phone</h3>
                    <p class="contact-text">+1 (555) 123-4567</p>
                </div>
            </div>

            <div class="contact-card">
                <div class="contact-icon contact-icon-purple">📍</div>
                <div>
                    <h3 class="contact-title">Address</h3>
                    <p class="contact-text">123 Business St, City, Country</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>