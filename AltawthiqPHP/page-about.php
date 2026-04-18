<?php
/* Template Name: Profile */
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <meta name="description" content="الملف التعريفي لشركة التوثيق للتدريب والاستشارات في الرياض، المملكة العربية السعودية.">
  <meta name="keywords" content="التوثيق, ملف تعريفي, تدريب, دورات تدريبية, برامج تدريبية, مركز تدريب, معهد تدريب, الرياض, السعودية, تطوير المهارات, تدريب الشركات">
  <meta name="geo.region" content="SA-01">
  <meta name="geo.placename" content="الرياض">
  <meta name="geo.position" content="24.7136;46.6753">
  <meta name="ICBM" content="24.7136, 46.6753">
  <link rel="canonical" href="<?php echo esc_url(function_exists('get_permalink') ? get_permalink() : home_url('/')); ?>">
  <meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
  <meta property="og:description" content="الملف التعريفي لشركة التوثيق للتدريب والاستشارات في الرياض، المملكة العربية السعودية.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo esc_url(function_exists('get_permalink') ? get_permalink() : home_url('/')); ?>">
  <meta property="og:image" content="<?php echo esc_url(home_url('/assets/images/main_logo_green.webp')); ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
  <meta name="twitter:description" content="الملف التعريفي لشركة التوثيق للتدريب والاستشارات في الرياض، المملكة العربية السعودية.">
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "Altathiq Training",
    "url": "<?php echo esc_url(home_url('/')); ?>",
    "email": "info@altawthiq.com",
    "telephone": "+966553300598",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Al-Murabba, near Passport Department Station",
      "addressLocality": "Riyadh",
      "addressRegion": "Riyadh Province",
      "addressCountry": "Saudi Arabia"
    }
  }
  </script>
  <title><?php wp_title(''); ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>?v=2">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body style="margin:0; overflow:hidden; height:100vh;">
<iframe src="<?php echo get_template_directory_uri(); ?>/assets/profile_ar.pdf" style="border:none; position:fixed; top:0; left:0; width:100%; height:100vh;">
  This browser does not support PDFs. Please download the PDF to view it: <a href="<?php echo get_template_directory_uri(); ?>/assets/profile_ar.pdf">Download PDF</a>.
</iframe>


  <!-- Scripts -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/main.js"></script>

</body>

</html>