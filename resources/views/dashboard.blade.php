<x-layout title="Dashboard">
    <div class="dashboard-container">
        <div class="dashboard-welcome">
            <h2>Welcome back, {{ Auth::user()->name }}! 👋</h2>
            <p>Here's what's happening with your account today.</p>
        </div>

        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon stat-icon-primary">📝</div>
                <div class="stat-info">
                    <h3 class="stat-number">{{ Auth::user()->posts()->count() }}</h3>
                    <p class="stat-label">Your Posts</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon stat-icon-success">💬</div>
                <div class="stat-info">
                    <h3 class="stat-number">{{ Auth::user()->comments()->count() }}</h3>
                    <p class="stat-label">Comments</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon stat-icon-warning">👁️</div>
                <div class="stat-info">
                    <h3 class="stat-number">0</h3>
                    <p class="stat-label">Profile Views</p>
                </div>
            </div>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3 class="card-title">Quick Actions</h3>
                <div class="action-list">
                    <a href="/blog/create" class="action-item">
                        <span class="action-icon">➕</span>
                        <span>Create New Post</span>
                    </a>
                    <a href="/blog" class="action-item">
                        <span class="action-icon">📚</span>
                        <span>View All Posts</span>
                    </a>
                    <a href="/profile" class="action-item">
                        <span class="action-icon">👤</span>
                        <span>Edit Profile</span>
                    </a>
                </div>
            </div>

            <div class="dashboard-card">
                <h3 class="card-title">Account Info</h3>
                <div class="info-list">
                    <div class="info-item">
                        <span class="info-label">Name:</span>
                        <span class="info-value">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email:</span>
                        <span class="info-value">{{ Auth::user()->email }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Member Since:</span>
                        <span class="info-value">{{ Auth::user()->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>