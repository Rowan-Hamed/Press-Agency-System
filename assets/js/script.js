function validateForm() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var phone = document.getElementById('phone').value;
    var isValid = true;

    var phoneRegex = /^\d{11,11}$/;

    if (phone.trim() === '') {
        isValid = false;
        setError('phone', 'Phone number is required');
      } else if (!phoneRegex.test(phone)) {
        isValid = false;
        setError('phone', 'Enter a valid phone number');
      } else {
        clearError('phone');
      }

    if (email.trim() === '') {
      isValid = false;
      setError('email', 'Email is required');
    } else if (!isValidEmail(email)) {
      isValid = false;
      setError('email', 'Enter a valid email address');
    } else {
      clearError('email');
    }

    if (password.length < 6 && password.length != 0) {
      isValid = false;
      setError('password', 'Password should be at least 6 characters');
    } else {
      clearError('password');
    }

    return isValid;
  }


  function setError(fieldName, message) {
    var errorElement = document.getElementById(fieldName + '-error');
    if (errorElement) {
      errorElement.innerHTML = message;
    } else {
      var errorSpan = document.createElement('span');
      errorSpan.id = fieldName + '-error';
      errorSpan.className = 'error';
      errorSpan.innerHTML = message;
      document.getElementById(fieldName).parentNode.appendChild(errorSpan);
    }
  }

  function clearError(fieldName) {
    var errorElement = document.getElementById(fieldName + '-error');
    if (errorElement) {
      errorElement.innerHTML = '';
    }
  }

  function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }