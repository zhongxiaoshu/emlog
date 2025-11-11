<?php
/**
 * 息壤信息咨询服务主题 - 文章详情页模板
 */

defined('EMLOG_ROOT') || exit('access denied!');
?>

<!-- DEBUG START: echo_log.php is executing -->
<div style="background: yellow; padding: 20px; margin: 20px; border: 5px solid red;">
    <h1 style="color: red; font-size: 40px;">调试信息 - echo_log.php 正在执行</h1>
    <p>log_title: <?php echo isset($log_title) ? htmlspecialchars($log_title, ENT_QUOTES, 'UTF-8') : 'NOT SET'; ?></p>
    <p>log_content exists: <?php echo isset($log_content) ? 'YES (' . mb_strlen($log_content) . ' chars)' : 'NO'; ?></p>
</div>
<!-- DEBUG END -->

<main class="xr-article">
    <div class="xr-container xr-container-narrow">
        <article class="xr-article-content">
            <!-- 文章头部 -->
            <header class="xr-article-header">
                <h1 class="xr-article-title" data-aos="fade-up">
                    <?php echo htmlspecialchars($log_title, ENT_QUOTES, 'UTF-8'); ?>
                </h1>
                <div class="xr-article-meta" data-aos="fade-up" data-aos-delay="100">
                    <time datetime="<?php echo date('Y-m-d', $date); ?>">
                        <?php echo date('Y年m月d日', $date); ?>
                    </time>
                    <span class="xr-meta-separator">·</span>
                    <span class="xr-article-views"><?php echo $views; ?> 阅读</span>
                    <?php if ($comnum > 0): ?>
                    <span class="xr-meta-separator">·</span>
                    <a href="#comments" class="xr-article-comments-link"><?php echo $comnum; ?> 评论</a>
                    <?php endif; ?>
                    <?php editflg($logid, $author); ?>
                </div>
            </header>

            <!-- 文章内容 -->
            <div class="xr-article-body" data-aos="fade-up" data-aos-delay="200">
                <?php echo $log_content; ?>
            </div>

            <!-- 文章标签 -->
            <?php if (blog_tag_exists($logid)): ?>
            <div class="xr-article-tags" data-aos="fade-up">
                <?php blog_tag($logid); ?>
            </div>
            <?php endif; ?>

            <!-- 相邻文章导航 -->
            <?php if (!empty($neighborLog)): ?>
            <nav class="xr-article-nav" data-aos="fade-up">
                <?php if (!empty($neighborLog['prev'])): ?>
                <a href="<?php echo $neighborLog['prev']['url']; ?>" class="xr-article-nav-prev">
                    <span class="xr-article-nav-label">← 上一篇</span>
                    <span class="xr-article-nav-title"><?php echo htmlspecialchars($neighborLog['prev']['title'], ENT_QUOTES, 'UTF-8'); ?></span>
                </a>
                <?php endif; ?>
                <?php if (!empty($neighborLog['next'])): ?>
                <a href="<?php echo $neighborLog['next']['url']; ?>" class="xr-article-nav-next">
                    <span class="xr-article-nav-label">下一篇 →</span>
                    <span class="xr-article-nav-title"><?php echo htmlspecialchars($neighborLog['next']['title'], ENT_QUOTES, 'UTF-8'); ?></span>
                </a>
                <?php endif; ?>
            </nav>
            <?php endif; ?>
        </article>

        <!-- 评论区域 -->
        <?php if ($allow_remark == 'y'): ?>
        <section class="xr-comments-section" id="comments">
            <h2 class="xr-comments-title">评论</h2>

            <!-- 评论表单 -->
            <?php blog_comments_post($logid, $ckname, $ckmail, $ckurl, $verifyCode, $allow_remark); ?>

            <!-- 评论列表 -->
            <?php if (!empty($comments)): ?>
            <div class="xr-comments-list">
                <?php blog_comments($comments, $comnum); ?>
            </div>
            <?php endif; ?>
        </section>
        <?php endif; ?>
    </div>
</main>

<?php include View::getView('footer'); ?>
