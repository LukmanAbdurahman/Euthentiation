<?php
use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase {
    private $pdo;
    private $auth;

    protected function setUp(): void {
        $this->pdo = $this->createMock(PDO::class);
        $this->auth = new Auth($this->pdo);
    }

    public function testRegisterWithShortUsername() {
        $result = $this->auth->register("ab", "user@example.com", "123456");
        $this->assertEquals("Username minimal 3 karakter!", $result);
    }

    public function testRegisterWithInvalidEmail() {
        $result = $this->auth->register("user", "invalidemail", "123456");
        $this->assertEquals("Email tidak valid!", $result);
    }

    public function testRegisterWithShortPassword() {
        $result = $this->auth->register("user", "user@example.com", "123");
        $this->assertEquals("Password minimal 6 karakter!", $result);
    }

    public function testLoginSuccess() {
        $user = ['password' => password_hash('secret123', PASSWORD_DEFAULT)];
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->once())->method('execute')->with(['user@example.com']);
        $stmtMock->expects($this->once())->method('fetch')->willReturn($user);

        $this->pdo->method('prepare')->willReturn($stmtMock);

        $result = $this->auth->login('user@example.com', 'secret123');
        $this->assertEquals("success", $result);
    }

    public function testLoginFailure() {
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->method('execute')->with(['user@example.com']);
        $stmtMock->method('fetch')->willReturn(false);

        $this->pdo->method('prepare')->willReturn($stmtMock);

        $result = $this->auth->login('user@example.com', 'wrongpass');
        $this->assertEquals("Email atau password salah!", $result);
    }

    public function testForgotPasswordFound() {
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->method('execute')->with(['user@example.com']);
        $stmtMock->method('fetch')->willReturn(true);

        $this->pdo->method('prepare')->willReturn($stmtMock);

        $result = $this->auth->forgotPassword('user@example.com');
        $this->assertEquals("Link reset telah dikirim (simulasi).", $result);
    }

    public function testForgotPasswordNotFound() {
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->method('execute')->with(['notfound@example.com']);
        $stmtMock->method('fetch')->willReturn(false);

        $this->pdo->method('prepare')->willReturn($stmtMock);

        $result = $this->auth->forgotPassword('notfound@example.com');
        $this->assertEquals("Email tidak ditemukan.", $result);
    }
}

