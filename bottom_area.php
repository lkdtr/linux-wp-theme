<div class="wrapper" id="bottom_area">
  <div id="duyuru-kayit">
    <?php
      if (isset($_POST['email']))
      {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
          mail('lkd-duyuru-request@liste.linux.org.tr',
               'subscribe',
               $_POST['email'],
               'From:' . $_POST['email']
              );
          
          echo 'Lutfen e-posta kutunuzu kontrol ediniz. ';
          echo '<a href="https://liste.linux.org.tr/kurallar.php">[KURALLAR]</a>';
        }
        else
        {
          echo 'Lutfen duzgun bir e-posta adresi giriniz.';
        }
      }
      else
      {
    ?>
        <form action="#bottom_area" method='POST'>
            Duyurulardan haberdar olmak icin, duyuru listemize kaydolun!
            <input type='textbox' length='60' name='email'><a href="https://liste.linux.org.tr/kurallar.php">[KURALLAR]</a>
        </form>
    <?php
        }
    ?>
  </div>
  <div id="google_search">
    <form target="google_window" action="http://www.google.com.tr/custom" method="get">
      <input type="hidden" value="www.linux.org.tr;liste.linux.org.tr;listweb.bilkent.edu.tr" name="domains" />
      <input class="text" type="text" value="" maxlength="255" name="q" />
      <input type="submit" value="Google'da Ara" name="sa" />
      <ul>
        <li>
          <input type="radio" value="www.linux.org.tr" checked="checked" name="sitesearch" />
          <span>Bu sitede arama yap</span>
        </li>
        <li>
          <input type="radio" value="liste.linux.org.tr" name="sitesearch" />
          <span>E-posta listelerinde arama yap</span>
        </li>
        <li>
          <input type="radio" value="listweb.bilkent.edu.tr" name="sitesearch" />
          <span>Eski listelerde arama yap</span>
        </li>
      </ul>
      <input type="hidden" value="pub-8542387655540803" name="client" />
      <input type="hidden" value="1" name="forid"/>
      <input type="hidden" value="utf-8" name="ie" />
      <input type="hidden" value="utf-8" name="oe" />
      <input type="hidden" value="GALT:#008000;GL:1;DIV:#336699;VLC:663399;AH:center;BGC:FFFFFF;LBGC:336699;ALC:0000FF;LC:0000FF;T:000000;GFNT:0000FF;GIMP:0000FF;FORID:1;" name="cof" />
      <input type="hidden" value="tr" name="hl" />
    </form>
  </div>
</div>
