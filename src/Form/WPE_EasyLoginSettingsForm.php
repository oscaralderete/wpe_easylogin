<?php

namespace Drupal\wpe_easylogin\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class WPE_EasyLoginSettingsForm extends ConfigFormBase
{
  protected function getEditableConfigNames()
  {
    return ['wpe_easylogin.settings'];
  }

  public function getFormId()
  {
    return 'wpe_easylogin_settings_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->config('wpe_easylogin.settings');

    $form['username'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Username'),
      '#default_value' => $config->get('username'),
    ];

    $form['password'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Password'),
      '#default_value' => $config->get('password'),
    ];

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $this->config('wpe_easylogin.settings')
      ->set('username', $form_state->getValue('username'))
      ->set('password', $form_state->getValue('password'))
      ->save();
    parent::submitForm($form, $form_state);
  }
}
