<?php
/*@name 关于我们*/

defined('EMLOG_ROOT') || exit('access denied!');

// 加载页头
require_once View::getView('header');
?>

<!-- 页面Hero区域 -->
<section class="xr-page-hero">
    <div class="xr-page-hero-bg"></div>
    <div class="xr-container">
        <div class="xr-page-hero-content">
            <h1 class="xr-page-title" data-aos="fade-up">
                <?php echo htmlspecialchars($log_title, ENT_QUOTES, 'UTF-8'); ?>
            </h1>
            <?php if (!empty($excerpt)): ?>
            <p class="xr-page-subtitle" data-aos="fade-up" data-aos-delay="100">
                <?php echo htmlspecialchars($excerpt, ENT_QUOTES, 'UTF-8'); ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- 页面主内容 -->
<main class="xr-page-content">
    <div class="xr-container">
        <article class="xr-about-article" data-aos="fade-up">
            <?php if (!empty($log_cover)): ?>
            <div class="xr-about-cover">
                <img src="<?php echo htmlspecialchars($log_cover, ENT_QUOTES, 'UTF-8'); ?>"
                     alt="<?php echo htmlspecialchars($log_title, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <?php endif; ?>

            <div class="xr-about-body">
                <?php echo $log_content; ?>
            </div>

            <!-- 页面元信息 -->
            <div class="xr-page-meta">
                <time datetime="<?php echo date('Y-m-d', $date); ?>">
                    最后更新：<?php echo date('Y年m月d日', $date); ?>
                </time>
                <?php if ($views > 0): ?>
                <span class="xr-page-views"><?php echo $views; ?> 次浏览</span>
                <?php endif; ?>
            </div>
        </article>

        <!-- 服务优势区块（复用首页组件） -->
        <?php xr_advantages_section(); ?>

        <!-- CTA区块 -->
        <section class="xr-page-cta" data-aos="fade-up">
            <div class="xr-cta-card">
                <h2 class="xr-cta-title">准备开始您的项目？</h2>
                <p class="xr-cta-desc">让我们一起探讨如何助力您的业务增长</p>
                <div class="xr-cta-buttons">
                    <a href="#contact" class="xr-btn xr-btn-primary xr-btn-lg">
                        <span>联系我们</span>
                    </a>
                    <a href="<?php echo BLOG_URL; ?>#services" class="xr-btn xr-btn-outline xr-btn-lg">
                        <span>查看服务</span>
                    </a>
                </div>
            </div>
        </section>
    </div>
</main>

<style>
/* 页面Hero区域 */
.xr-page-hero {
    position: relative;
    padding: 120px 0 80px;
    overflow: hidden;
}

.xr-page-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, var(--color-primary-light), var(--color-surface));
    opacity: 0.1;
    z-index: 0;
}

.xr-page-hero-content {
    position: relative;
    z-index: 1;
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.xr-page-title {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 700;
    color: var(--color-text-primary);
    margin-bottom: var(--spacing-md);
}

.xr-page-subtitle {
    font-size: clamp(1rem, 2.5vw, 1.25rem);
    color: var(--color-text-secondary);
    line-height: 1.6;
}

/* 页面主内容 */
.xr-page-content {
    padding: var(--spacing-2xl) 0;
}

.xr-about-article {
    max-width: 900px;
    margin: 0 auto var(--spacing-2xl);
    background: var(--color-surface);
    border-radius: var(--radius-lg);
    padding: var(--spacing-2xl);
    box-shadow: var(--shadow-md);
}

.xr-about-cover {
    margin-bottom: var(--spacing-xl);
    border-radius: var(--radius-md);
    overflow: hidden;
}

.xr-about-cover img {
    width: 100%;
    height: auto;
    display: block;
}

.xr-about-body {
    font-size: 1.0625rem;
    line-height: 1.8;
    color: var(--color-text-primary);
}

.xr-about-body h2,
.xr-about-body h3,
.xr-about-body h4 {
    margin-top: var(--spacing-xl);
    margin-bottom: var(--spacing-md);
    color: var(--color-text-primary);
    font-weight: 600;
}

.xr-about-body h2 {
    font-size: 1.75rem;
}

.xr-about-body h3 {
    font-size: 1.5rem;
}

.xr-about-body h4 {
    font-size: 1.25rem;
}

.xr-about-body p {
    margin-bottom: var(--spacing-md);
}

.xr-about-body ul,
.xr-about-body ol {
    margin-bottom: var(--spacing-md);
    padding-left: var(--spacing-xl);
}

.xr-about-body li {
    margin-bottom: var(--spacing-xs);
}

.xr-about-body img {
    max-width: 100%;
    height: auto;
    border-radius: var(--radius-md);
    margin: var(--spacing-lg) 0;
}

.xr-about-body blockquote {
    border-left: 4px solid var(--color-primary);
    padding-left: var(--spacing-lg);
    margin: var(--spacing-lg) 0;
    font-style: italic;
    color: var(--color-text-secondary);
}

.xr-page-meta {
    display: flex;
    align-items: center;
    gap: var(--spacing-lg);
    padding-top: var(--spacing-lg);
    margin-top: var(--spacing-xl);
    border-top: 1px solid var(--color-border);
    font-size: 0.875rem;
    color: var(--color-text-secondary);
}

/* CTA区块 */
.xr-page-cta {
    margin-top: var(--spacing-2xl);
}

.xr-cta-card {
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
    border-radius: var(--radius-xl);
    padding: var(--spacing-2xl);
    text-align: center;
    color: white;
}

.xr-cta-title {
    font-size: clamp(1.5rem, 4vw, 2rem);
    font-weight: 700;
    margin-bottom: var(--spacing-md);
}

.xr-cta-desc {
    font-size: 1.125rem;
    opacity: 0.9;
    margin-bottom: var(--spacing-xl);
}

.xr-cta-buttons {
    display: flex;
    gap: var(--spacing-md);
    justify-content: center;
    flex-wrap: wrap;
}

.xr-cta-buttons .xr-btn-outline {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border-color: rgba(255, 255, 255, 0.3);
}

.xr-cta-buttons .xr-btn-outline:hover {
    background: rgba(255, 255, 255, 0.2);
}

/* 移动端适配 */
@media (max-width: 768px) {
    .xr-page-hero {
        padding: 80px 0 60px;
    }

    .xr-about-article {
        padding: var(--spacing-lg);
    }

    .xr-about-body {
        font-size: 1rem;
    }

    .xr-cta-card {
        padding: var(--spacing-xl) var(--spacing-lg);
    }

    .xr-page-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: var(--spacing-xs);
    }
}
</style>

<?php require_once View::getView('footer'); ?>
