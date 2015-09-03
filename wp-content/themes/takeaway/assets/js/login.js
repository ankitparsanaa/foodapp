// header login register scripts
//-------------------------------------------

var $headerLoginRegister = $('#header .header-login, #header .header-register');

$headerLoginRegister.each(function () {
  var $this = $(this);

  $this.children('a').on('click', function (event) {
    event.preventDefault();
    $this.toggleClass('active');
  });

  $this.on('clickoutside touchendoutside', function () {
    if ($this.hasClass('active')) { $this.removeClass('active'); }
  });
});

var $headerNavbar = $('#header .header-nav-bar .primary-nav > li');

$headerNavbar.each(function () {
	var $this = $(this);
	$this.children('a').on('click', function (event) {
		$this.toggleClass('active');
	});

	$this.on('clickoutside touchendoutside', function () {
		if ($this.hasClass('active')) { $this.removeClass('active'); }
	});
});