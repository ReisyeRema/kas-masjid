<link
rel="icon"
href="{{ asset('asset2/masjid.png') }}"
type="image/x-icon"
/>

<!-- Fonts and icons -->
<script src="{{ asset('asset/assets/js/plugin/webfont/webfont.min.js') }}"></script>
<script>
WebFont.load({
  google: { families: ["Public Sans:300,400,500,600,700"] },
  custom: {
    families: [
      "Font Awesome 5 Solid",
      "Font Awesome 5 Regular",
      "Font Awesome 5 Brands",
      "simple-line-icons",
    ],
    urls: ["{{ asset('asset/assets/css/fonts.min.css') }}"],
  },
  active: function () {
    sessionStorage.fonts = true;
  },
});
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('asset/assets/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('asset/assets/css/plugins.min.css') }}" />
<link rel="stylesheet" href="{{ asset('asset/assets/css/kaiadmin.min.css') }}" />

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="{{ asset('asset/assets/css/demo.css') }}" />
