# Black Box Test Cases for Web Chatbot Application

## ✅ Login Module
| No | Feature | Scenario                           | Input                        | Expected Output                                      | Result |
|----|---------|------------------------------------|------------------------------|------------------------------------------------------|--------|
| 1  | Login   | Valid login                        | Correct Email & Password     | Redirect to chatbot or dashboard                     | ✅      |
| 2  | Login   | Invalid email                      | Wrong Email                  | Show message "Email dan Password Salah"              | ✅      |
| 3  | Login   | Invalid password                   | Wrong Password               | Show message "Email dan Password Salah"              | ✅      |
| 4  | Login   | Empty input                        | Email & Password not filled  | Show message to fill the form                        | ✅      |

## ✅ Register Module
| No | Feature  | Scenario                         | Input                        | Expected Output                                      | Result |
|----|----------|----------------------------------|------------------------------|------------------------------------------------------|--------|
| 5  | Register | Register with valid data         | Name, Email, Password        | Account created & redirect to login page             | ✅      |
| 6  | Register | Email already registered         | Existing Email               | Show error message "email telah digunakan"           | ✅      |
| 7  | Register | Empty registration form          | No input                     | Show message to fill the form                        | ✅      |

## ✅ Forgot Password Module
| No | Feature        | Scenario                     | Input             | Expected Output                        | Result |
|----|----------------|------------------------------|-------------------|----------------------------------------|--------|
| 8  | Lupa Password  | Valid email reset            | Valid Email       | Success message & reset link sent      | ✅      |
| 9  | Lupa Password  | Email not registered         | Wrong Email       | Show error "Email tidak ditemukan"     | ✅      |

## ✅ Chatbot Module
| No | Feature  | Scenario                 | Input   | Expected Output            | Result |
|----|----------|--------------------------|---------|----------------------------|--------|
| 10 | Chatbot  | Send normal message      | "Halo"  | Chatbot responds            | ✅      |
| 11 | Chatbot  | Send empty message       | ""      | Chatbot rejects or ignores  | ✅      |

## ❌ Logout Module
| No | Feature | Scenario       | Input | Expected Output                               | Result |
|----|---------|----------------|-------|-----------------------------------------------|--------|
| 12 | Logout  | Click logout   | Click | Show confirmation & redirect to landing page  | ❌      |

