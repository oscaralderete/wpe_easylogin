/**
 * Developed by Oscar Alderete - WPE
 * email: oscaralderete@gmail.com
 * webiste: https://wpe.net.pe
 */
(function (Drupal, drupalSettings) {
  Drupal.behaviors.easylogin = {
    attach: function (context, settings) {
      const usr = context.querySelector('#edit-name'),
        pass = context.querySelector('#edit-pass'),
        form = context.querySelector('#user-login-form');

      if (usr && pass && form) {
        const btn = document.createElement('button');
        btn.classList.add('button');
        btn.type = 'button';
        btn.textContent = 'Easy Login';

        form.querySelector('#edit-submit').insertAdjacentElement('afterend', btn);

        btn.addEventListener('click', () => {
          usr.value = drupalSettings.wpe_easylogin.username || '';
          pass.value = drupalSettings.wpe_easylogin.password || '';
          form.submit();
        });
      }
    }
  };
})(Drupal, drupalSettings);
