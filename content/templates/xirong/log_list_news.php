<?php
/*@name 新闻中心*/

defined('EMLOG_ROOT') || exit('access denied!');

// 不需要手动include header，sort_controller会自动include
// require_once View::getView('header');
?>

<!-- 新闻中心Hero区域 -->
<section class="xr-news-hero">
    <div class="xr-news-hero-bg"></div>
    <div class="xr-container">
        <div class="xr-news-hero-content">
            <h1 class="xr-news-hero-title" data-aos="fade-up">
                <?php echo htmlspecialchars($sortName, ENT_QUOTES, 'UTF-8'); ?>
            </h1>
            <?php if (!empty($description)): ?>
            <p class="xr-news-hero-desc" data-aos="fade-up" data-aos-delay="100">
                <?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- 新闻列表 -->
<main class="xr-news-list">
    <div class="xr-container">
        <?php if (!empty($logs)): ?>
        <div class="xr-news-grid">
            <?php foreach ($logs as $value): ?>
            <article class="xr-news-card" data-aos="fade-up">
                <?php if (!empty($value['log_cover'])): ?>
                <div class="xr-news-card-cover">
                    <a href="<?php echo $value['log_url']; ?>">
                        <img src="<?php echo $value['log_cover']; ?>"
                             alt="<?php echo htmlspecialchars($value['log_title'], ENT_QUOTES, 'UTF-8'); ?>">
                    </a>
                    <?php if (!empty($value['top']) && $value['top'] == 'y'): ?>
                    <span class="xr-news-badge">置顶</span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <div class="xr-news-card-body">
                    <div class="xr-news-card-meta">
                        <time datetime="<?php echo date('Y-m-d', $value['date']); ?>">
                            <svg class="xr-icon xr-icon-sm"><use xlink:href="#icon-calendar"></use></svg>
                            <?php echo date('Y-m-d', $value['date']); ?>
                        </time>
                        <span class="xr-news-card-views">
                            <svg class="xr-icon xr-icon-sm"><use xlink:href="#icon-eye"></use></svg>
                            <?php echo $value['views']; ?>
                        </span>
                        <?php if ($value['comnum'] > 0): ?>
                        <span class="xr-news-card-comments">
                            <svg class="xr-icon xr-icon-sm"><use xlink:href="#icon-comment"></use></svg>
                            <?php echo $value['comnum']; ?>
                        </span>
                        <?php endif; ?>
                    </div>

                    <h2 class="xr-news-card-title">
                        <a href="<?php echo $value['log_url']; ?>">
                            <?php echo htmlspecialchars($value['log_title'], ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </h2>

                    <?php if (!empty($value['log_description'])): ?>
                    <p class="xr-news-card-excerpt">
                        <?php echo htmlspecialchars(mb_substr(strip_tags($value['log_description']), 0, 120, 'UTF-8'), ENT_QUOTES, 'UTF-8'); ?>...
                    </p>
                    <?php endif; ?>

                    <div class="xr-news-card-footer">
                        <a href="<?php echo $value['log_url']; ?>" class="xr-news-card-link">
                            阅读全文
                            <svg class="xr-icon xr-icon-sm"><use xlink:href="#icon-arrow-right"></use></svg>
                        </a>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <!-- 分页 -->
        <?php if (!empty($page_url)): ?>
        <div class="xr-pagination">
            <?php echo $page_url; ?>
        </div>
        <?php endif; ?>

        <?php else: ?>
        <div class="xr-news-empty" data-aos="fade-up">
            <svg class="xr-icon xr-icon-xl"><use xlink:href="#icon-document"></use></svg>
            <p>暂无新闻内容</p>
        </div>
        <?php endif; ?>
    </div>
</main>

<style>
/* 新闻Hero区域 */
.xr-news-hero {
    position: relative;
    padding: 120px 0 120px; /* 上下对称padding，视觉居中 */
    overflow: hidden;
    background: var(--color-surface);
    display: flex;
    align-items: center;
    min-height: 280px; /* 确保最小高度 */
}

.xr-news-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, var(--color-primary-light), var(--color-surface));
    opacity: 0.1;
}

.xr-news-hero-content {
    position: relative;
    z-index: 1;
    text-align: center;
    max-width: 700px;
    margin: 0 auto;
}

.xr-news-hero-title {
    font-size: clamp(2rem, 5vw, 2.5rem);
    font-weight: 700;
    color: var(--color-text-primary);
    margin-bottom: var(--spacing-md);
}

.xr-news-hero-desc {
    font-size: 1.125rem;
    color: var(--color-text-secondary);
    line-height: 1.6;
}

/* 新闻列表 */
.xr-news-list {
    padding: var(--spacing-2xl) 0;
}

.xr-news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: var(--spacing-xl);
    margin-bottom: var(--spacing-2xl);
}

.xr-news-card {
    background: var(--color-surface);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all 0.3s var(--transition-smooth);
    display: flex;
    flex-direction: column;
}

.xr-news-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-4px);
}

.xr-news-card-cover {
    position: relative;
    width: 100%;
    padding-top: 56.25%; /* 16:9 比例 */
    overflow: hidden;
    background: var(--color-background);
}

.xr-news-card-cover a {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.xr-news-card-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s var(--transition-smooth);
}

.xr-news-card:hover .xr-news-card-cover img {
    transform: scale(1.05);
}

.xr-news-badge {
    position: absolute;
    top: var(--spacing-md);
    right: var(--spacing-md);
    padding: var(--spacing-xs) var(--spacing-md);
    background: var(--color-primary);
    color: white;
    font-size: 0.75rem;
    font-weight: 600;
    border-radius: var(--radius-full);
    z-index: 1;
}

.xr-news-card-body {
    padding: var(--spacing-lg);
    flex: 1;
    display: flex;
    flex-direction: column;
}

.xr-news-card-meta {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-md);
    font-size: 0.875rem;
    color: var(--color-text-secondary);
}

.xr-news-card-meta > * {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
}

.xr-icon-sm {
    width: 16px;
    height: 16px;
}

.xr-news-card-title {
    font-size: 1.25rem;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: var(--spacing-md);
}

.xr-news-card-title a {
    color: var(--color-text-primary);
    text-decoration: none;
    transition: color 0.2s;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.xr-news-card-title a:hover {
    color: var(--color-primary);
}

.xr-news-card-excerpt {
    color: var(--color-text-secondary);
    line-height: 1.6;
    margin-bottom: var(--spacing-md);
    flex: 1;
}

.xr-news-card-footer {
    padding-top: var(--spacing-md);
    border-top: 1px solid var(--color-border);
}

.xr-news-card-link {
    display: inline-flex;
    align-items: center;
    gap: var(--spacing-xs);
    color: var(--color-primary);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.9375rem;
    transition: gap 0.2s;
}

.xr-news-card-link:hover {
    gap: var(--spacing-sm);
}

/* 空状态 */
.xr-news-empty {
    text-align: center;
    padding: var(--spacing-2xl);
    color: var(--color-text-secondary);
}

.xr-news-empty .xr-icon {
    width: 80px;
    height: 80px;
    margin-bottom: var(--spacing-md);
    opacity: 0.3;
}

.xr-news-empty p {
    font-size: 1.125rem;
}

/* 分页样式 */
.xr-pagination {
    display: flex;
    justify-content: center;
    gap: var(--spacing-sm);
    margin-top: var(--spacing-2xl);
}

/* 移动端适配 */
@media (max-width: 768px) {
    .xr-news-hero {
        padding: 80px 0 40px;
    }

    .xr-news-grid {
        grid-template-columns: 1fr;
        gap: var(--spacing-lg);
    }

    .xr-news-card-body {
        padding: var(--spacing-md);
    }
}
</style>

<!-- SVG图标补充 -->
<svg style="display: none;">
    <!-- 日历图标 -->
    <symbol id="icon-calendar" viewBox="0 0 24 24">
        <rect x="3" y="4" width="18" height="18" rx="2" fill="none" stroke="currentColor" stroke-width="2"/>
        <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M8 2v4M16 2v4M3 10h18"/>
    </symbol>

    <!-- 眼睛图标 -->
    <symbol id="icon-eye" viewBox="0 0 24 24">
        <path fill="none" stroke="currentColor" stroke-width="2" d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
        <circle cx="12" cy="12" r="3" fill="none" stroke="currentColor" stroke-width="2"/>
    </symbol>

    <!-- 评论图标 -->
    <symbol id="icon-comment" viewBox="0 0 24 24">
        <path fill="currentColor" d="M20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4V4c0-1.1-.9-2-2-2z"/>
    </symbol>

    <!-- 右箭头 -->
    <symbol id="icon-arrow-right" viewBox="0 0 24 24">
        <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/>
    </symbol>
</svg>

<?php require_once View::getView('footer'); ?>
