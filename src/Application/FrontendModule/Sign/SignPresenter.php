<?php

declare(strict_types=1);

namespace Wratche\App\Application\FrontendModule\Sign;

use Nette;
use Nette\Application\UI\Form;
use Wratche\App\Application\UI\Presenter\StructuredTemplates;

final class SignPresenter extends Nette\Application\UI\Presenter
{
    use StructuredTemplates;

    public function signInFormSucceeded(Form $form, \stdClass $values): void
    {
        try {
            $this->getUser()->login($values->username, $values->password);
            $this->redirect('Homepage:');
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Incorrect username or password.');
        }
    }

    public function actionOut(): void
    {
        $this->getUser()->logout();
        $this->flashMessage('You have been signed out.');
        $this->redirect('Homepage:');
    }
    /**
     * Sign-in form factory.
     */
    protected function createComponentSignInForm(): Form
    {
        $form = new Form();
        $form->addText('username', 'Username:')
            ->setRequired('Please enter your username.');

        $form->addPassword('password', 'Password:')
            ->setRequired('Please enter your password.');

        $form->addSubmit('send', 'Sign in');

        // call method signInFormSucceeded() on success
        $form->onSuccess[] = [$this, 'signInFormSucceeded'];
        return $form;
    }
}
