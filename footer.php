      </main>
      <?php if ( is_active_sidebar( 'basement' ) ) get_sidebar(); ?>
      <footer class="wrapper__item wrapper__item--footer footer">
        <div class="container">
          <div class="row middle-xs">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 first-sm">
              <p class="footer__copyright copyright"><?php echo date( 'Y' ); ?> &copy; <?php bloginfo( 'name' ); ?></p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 first-xs">
              <?php echo openday\render_socials_list(); ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <p class="footer__developer developer"><?php _e( 'ЦКТ ПГТУ', OPENDAY_TEXTDOMAIN ); ?></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>