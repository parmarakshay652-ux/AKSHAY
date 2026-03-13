<?php
function getMetaTags($title = '', $description = '', $keywords = '', $image = '') {
    $siteName = 'The Wedding House';
    $defaultDescription = 'Find the best wedding vendors for your dream wedding. Photographers, makeup artists, planners, venues, decorators, and more.';
    $defaultKeywords = 'wedding vendors, wedding photographers, makeup artists, wedding planners, wedding venues, wedding decorators, mehndi artists';
    $defaultImage = '/assets/images/wedding-hero.jpg'; // placeholder

    $metaTitle = $title ? $title . ' | ' . $siteName : $siteName;
    $metaDescription = $description ?: $defaultDescription;
    $metaKeywords = $keywords ?: $defaultKeywords;
    $metaImage = $image ?: $defaultImage;

    echo "<title>$metaTitle</title>\n";
    echo "<meta name='description' content='$metaDescription'>\n";
    echo "<meta name='keywords' content='$metaKeywords'>\n";
    echo "<meta property='og:title' content='$metaTitle'>\n";
    echo "<meta property='og:description' content='$metaDescription'>\n";
    echo "<meta property='og:image' content='$metaImage'>\n";
    echo "<meta property='og:type' content='website'>\n";
    echo "<meta name='twitter:card' content='summary_large_image'>\n";
    echo "<meta name='twitter:title' content='$metaTitle'>\n";
    echo "<meta name='twitter:description' content='$metaDescription'>\n";
    echo "<meta name='twitter:image' content='$metaImage'>\n";
}
?>