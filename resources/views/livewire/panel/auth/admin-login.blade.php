<div class="w-50" wire:ignore>

    <div>
        <!-- Email input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="email" maxlength="60" class="form-control form-control-lg email-input" />
            <label class="form-label" for="email">Email</label>
            <div class="form-helper text-danger email-validation"></div>
        </div>

        <!-- Password input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" id="passwordID" maxlength="30" class="form-control form-control-lg password-input" />
            <label class="form-label" for="passwordID">Password</label>
            <div class="form-helper text-danger password-validation"></div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4 px-2">
            <!-- Checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="rememberMe" />
                <label class="form-check-label" for="rememberMe">تذكرني</label>
            </div>
            <div>
                <a href="#">هل نسيت كلمة المرور</a>
            </div>
        </div>

        <!-- Submit button -->

        <button type="submit" data-mdb-button-init="" data-mdb-ripple-init="" data-mdb-button-initialized="true"
            class="btn btn-lg text-white btn-block submitting-login-button"
            style="background: linear-gradient(45deg, #5299FF, #B2659D); border: none;">
            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true" wire:loading></span>
            تسجيل الدخول
        </button>

    </div>

</div>



@push('admin-login-script')
    <script>
        $(document).ready(function() {

            // Values
            let $email_value = "";
            let $password_value = "";

            // Validations
            const $email_validation = $(".email-validation");
            const $password_validation = $(".password-validation");

            // Inputs
            const $phone_email_input = $(".email-input");
            const $password_input = $(".password-input");

            // Buttons
            const $submitting_login_button = $(".submitting-login-button");

            // Clear validation messages on input
            $phone_email_input.on('input', function() {
                $email_validation.text(""); // Clear validation message
                $email_value = $(this).val(); // Update the email/phone value
            });

            $password_input.on('input', function() {
                $password_validation.text(""); // Clear validation message
                $password_value = $(this).val(); // Update the password value
            });


            // Login button click event
            $submitting_login_button.on('click', function() {
                const isValid = admin_login_validation(); // Validate input fields

                if (isValid) {
                    @this.set('email', $email_value); // Set email/phone value in Livewire
                    @this.set('password', $password_value); // Set password value in Livewire
                    Livewire.dispatch('submitting-login-data'); // Dispatch the event
                }
            });

            // Admin login validation function
            function admin_login_validation() {
                $email_validation.text(""); // Clear validation message
                $password_validation.text(""); // Clear validation message

                // Check if both email/phone and password are provided
                if (!$email_value && !$password_value) {
                    $email_validation.text("Check the email or phone number");
                    $password_validation.text("Check the password");
                    return false;
                }

                if (!$email_value) {
                    $email_validation.text("Check the email or phone number");
                    return false;
                }
                if (!$password_value) {
                    $password_validation.text("Check the password");
                    return false;
                }

                return true; // Return true if all validations pass
            }

            // Validation response from the server
            Livewire.on('admin-db-login-validation', function(value) {
                const message = value[0];

                if (message.password) {
                    $password_validation.text(message.password); // Show password error message
                }

                if (message.email) {
                    $email_validation.text(message.email); // Show email error message
                }
            });

        });
    </script>
@endpush
