<?php
/*@name 新闻详情*/

defined('EMLOG_ROOT') || exit('access denied!');

// 加载页头
require_once View::getView('header');
?>

<!-- 文章头部 -->
<article class="xr-article-wrapper">
    <div class="xr-container">
        <!-- 文章头部信息 -->
        <header class="xr-article-header">
            <div class="xr-article-breadcrumb">
                <a href="<?php echo BLOG_URL; ?>">首页</a>
                <span class="xr-breadcrumb-separator">/</span>
                <?php echo blog_sort($logid); ?>
            </div>

            <h1 class="xr-article-title" data-aos="fade-up">
                <?php echo htmlspecialchars($log_title, ENT_QUOTES, 'UTF-8'); ?>
            </h1>

            <div class="xr-article-meta" data-aos="fade-up" data-aos-delay="100">
                <div class="xr-article-meta-item">
                    <svg class="xr-icon xr-icon-sm"><use xlink:href="#icon-calendar"></use></svg>
                    <time datetime="<?php echo date('Y-m-d', $date); ?>">
                        <?php echo date('Y年m月d日', $date); ?>
                    </time>
                </div>
                <div class="xr-article-meta-item">
                    <svg class="xr-icon xr-icon-sm"><use xlink:href="#icon-eye"></use></svg>
                    <span><?php echo $views; ?> 阅读</span>
                </div>
                <?php if ($comnum > 0): ?>
                <div class="xr-article-meta-item">
                    <svg class="xr-icon xr-icon-sm"><use xlink:href="#icon-comment"></use></svg>
                    <span><?php echo $comnum; ?> 评论</span>
                </div>
                <?php endif; ?>
                <div class="xr-article-meta-item">
                    <?php echo blog_author($author); ?>
                </div>
            </div>
        </header>

        <!-- 文章主体 -->
        <main class="xr-article-main">
            <?php if (!empty($log_cover)): ?>
            <div class="xr-article-cover" data-aos="fade-up">
                <img src="<?php echo htmlspecialchars($log_cover, ENT_QUOTES, 'UTF-8'); ?>"
                     alt="<?php echo htmlspecialchars($log_title, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <?php endif; ?>

            <div class="xr-article-content" data-aos="fade-up">
                <?php echo $log_content; ?>
            </div>

            <!-- 文章标签 -->
            <?php if (blog_tag_exists($logid)): ?>
            <div class="xr-article-tags" data-aos="fade-up">
                <svg class="xr-icon xr-icon-sm"><use xlink:href="#icon-tag"></use></svg>
                <?php echo blog_tag($logid); ?>
            </div>
            <?php endif; ?>

            <!-- 上一篇/下一篇 -->
            <nav class="xr-article-nav" data-aos="fade-up">
                <?php neighbor_log($neighborLog); ?>
            </nav>

            <!-- 相关文章插件挂载点 -->
            <?php doAction('log_related', $logData); ?>

            <!-- 评论区 -->
            <?php if ($allow_remark == 'y'): ?>
            <div class="xr-article-comments" data-aos="fade-up">
                <h2 class="xr-comments-title">文章评论</h2>
                <?php blog_comments($comments); ?>
                <?php blog_comments_post($logid, $ckname, $ckmail, $ckurl, $verifyCode, $allow_remark); ?>
            </div>
            <?php endif; ?>
        </main>
    </div>
</article>

<style>
/* 文章容器 */
.xr-article-wrapper {
    padding: var(--spacing-2xl) 0;
    min-height: 60vh;
}

/* 文章头部 */
.xr-article-header {
    max-width: 900px;
    margin: 0 auto var(--spacing-2xl);
    text-align: center;
}

.xr-article-breadcrumb {
    font-size: 0.875rem;
    color: var(--color-text-secondary);
    margin-bottom: var(--spacing-lg);
}

.xr-article-breadcrumb a {
    color: var(--color-text-secondary);
    text-decoration: none;
    transition: color 0.2s;
}

.xr-article-breadcrumb a:hover {
    color: var(--color-primary);
}

.xr-breadcrumb-separator {
    margin: 0 var(--spacing-xs);
}

.xr-article-title {
    font-size: clamp(1.75rem, 5vw, 2.5rem);
    font-weight: 700;
    line-height: 1.3;
    color: var(--color-text-primary);
    margin-bottom: var(--spacing-lg);
}

.xr-article-meta {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: var(--spacing-lg);
    font-size: 0.9375rem;
    color: var(--color-text-secondary);
}

.xr-article-meta-item {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
}

/* 文章主体 */
.xr-article-main {
    max-width: 900px;
    margin: 0 auto;
}

.xr-article-cover {
    margin-bottom: var(--spacing-2xl);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
}

.xr-article-cover img {
    width: 100%;
    height: auto;
    display: block;
}

/* 文章内容 */
.xr-article-content {
    background: var(--color-surface);
    border-radius: var(--radius-lg);
    padding: var(--spacing-2xl);
    box-shadow: var(--shadow-sm);
    font-size: 1.0625rem;
    line-height: 1.8;
    color: var(--color-text-primary);
}

.xr-article-content h1,
.xr-article-content h2,
.xr-article-content h3,
.xr-article-content h4,
.xr-article-content h5,
.xr-article-content h6 {
    margin-top: var(--spacing-xl);
    margin-bottom: var(--spacing-md);
    font-weight: 600;
    color: var(--color-text-primary);
    line-height: 1.4;
}

.xr-article-content h1 { font-size: 2rem; }
.xr-article-content h2 { font-size: 1.75rem; }
.xr-article-content h3 { font-size: 1.5rem; }
.xr-article-content h4 { font-size: 1.25rem; }

.xr-article-content p {
    margin-bottom: var(--spacing-md);
}

.xr-article-content a {
    color: var(--color-primary);
    text-decoration: none;
    border-bottom: 1px solid var(--color-primary);
    transition: opacity 0.2s;
}

.xr-article-content a:hover {
    opacity: 0.8;
}

.xr-article-content img {
    max-width: 100%;
    height: auto;
    border-radius: var(--radius-md);
    margin: var(--spacing-lg) 0;
    display: block;
}

.xr-article-content ul,
.xr-article-content ol {
    margin-bottom: var(--spacing-md);
    padding-left: var(--spacing-xl);
}

.xr-article-content li {
    margin-bottom: var(--spacing-xs);
}

.xr-article-content blockquote {
    border-left: 4px solid var(--color-primary);
    padding-left: var(--spacing-lg);
    margin: var(--spacing-lg) 0;
    font-style: italic;
    color: var(--color-text-secondary);
}

.xr-article-content pre {
    background: var(--color-background);
    border-radius: var(--radius-md);
    padding: var(--spacing-lg);
    overflow-x: auto;
    margin: var(--spacing-lg) 0;
}

.xr-article-content code {
    background: var(--color-background);
    padding: 2px 6px;
    border-radius: var(--radius-sm);
    font-family: 'Courier New', monospace;
    font-size: 0.9em;
}

.xr-article-content pre code {
    background: none;
    padding: 0;
}

.xr-article-content table {
    width: 100%;
    border-collapse: collapse;
    margin: var(--spacing-lg) 0;
}

.xr-article-content th,
.xr-article-content td {
    padding: var(--spacing-sm) var(--spacing-md);
    border: 1px solid var(--color-border);
    text-align: left;
}

.xr-article-content th {
    background: var(--color-background);
    font-weight: 600;
}

/* 文章标签 */
.xr-article-tags {
    margin-top: var(--spacing-2xl);
    padding-top: var(--spacing-xl);
    border-top: 1px solid var(--color-border);
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    flex-wrap: wrap;
}

.xr-article-tags a {
    display: inline-block;
    padding: var(--spacing-xs) var(--spacing-md);
    background: var(--color-background);
    color: var(--color-text-secondary);
    text-decoration: none;
    border-radius: var(--radius-full);
    font-size: 0.875rem;
    transition: all 0.2s;
}

.xr-article-tags a:hover {
    background: var(--color-primary);
    color: white;
}

/* 上下篇导航 */
.xr-article-nav {
    margin-top: var(--spacing-xl);
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-md);
}

.xr-article-nav a {
    display: block;
    padding: var(--spacing-lg);
    background: var(--color-surface);
    border-radius: var(--radius-md);
    text-decoration: none;
    color: var(--color-text-primary);
    box-shadow: var(--shadow-sm);
    transition: all 0.3s var(--transition-smooth);
}

.xr-article-nav a:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}

/* 评论区 */
.xr-article-comments {
    margin-top: var(--spacing-2xl);
    padding-top: var(--spacing-2xl);
    border-top: 2px solid var(--color-border);
}

.xr-comments-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: var(--spacing-xl);
    color: var(--color-text-primary);
}

/* 移动端适配 */
@media (max-width: 768px) {
    .xr-article-wrapper {
        padding: var(--spacing-lg) 0;
    }

    .xr-article-header {
        margin-bottom: var(--spacing-xl);
    }

    .xr-article-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: var(--spacing-xs);
    }

    .xr-article-content {
        padding: var(--spacing-lg);
        font-size: 1rem;
    }

    .xr-article-content h1 { font-size: 1.75rem; }
    .xr-article-content h2 { font-size: 1.5rem; }
    .xr-article-content h3 { font-size: 1.25rem; }
    .xr-article-content h4 { font-size: 1.125rem; }
}
</style>

<!-- SVG图标补充 -->
<svg style="display: none;">
    <!-- 标签图标 -->
    <symbol id="icon-tag" viewBox="0 0 24 24">
        <path fill="currentColor" d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58.55 0 1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41 0-.55-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"/>
    </symbol>
</svg>

<?php require_once View::getView('footer'); ?>
