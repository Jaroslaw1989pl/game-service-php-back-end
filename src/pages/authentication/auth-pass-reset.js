// custom style components
import './auth-pass-reset.css';
// custom functions components
import Validator from '../../scripts/validator.class';
// custom components
import AuthForm from '../../components/layout/auth-form';
import TextInput from '../../components/form/auth-text-input';


const ResetPasswordPage = () => {

  const clearError = () => {
    const errorElement = document.getElementById('reset-password-form-error');
    if (errorElement.style.display === 'block') errorElement.style.display = 'none';
  };

  const submit = (event) => {
    event.preventDefault();
    // form inputs
    const inputElement = document.getElementById('user-email');
    // form elements
    const errorElement = document.getElementById('reset-password-form-error');

    const validator = new Validator();

    try {
      if (inputElement.value === '') throw 'Please enter your email address.';
      else if (!validator.email(inputElement.value)) throw 'That\'s an invalid email.';
    } catch (error) {
      errorElement.textContent = error;
      errorElement.style.display = 'block';
    }
  };

  return (
    <AuthForm id="reset-password" method="POST" onSubmit={submit}>
      <TextInput inputType="text" id="user-email" name="userEmail" placeholder="Email address" onInput={clearError}/>
    </AuthForm>
  );
};

export default ResetPasswordPage;