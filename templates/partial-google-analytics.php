<?php $ga_id = get_field('google_analytics_id', 'option'); ?>

<?php if ($ga_id) : ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga_id; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag () { dataLayer.push(arguments) }
  gtag('js', new Date());
  gtag('config', '<?php echo $ga_id ?>');
</script>
<?php endif; ?>
