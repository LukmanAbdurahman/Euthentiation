<?php
use PHPUnit\Framework\TestCase;

class ChatbotHandlerTest extends TestCase {
    private $chatbot;

    protected function setUp(): void {
        // Masukkan API key dummy agar tidak konek ke server
        $this->chatbot = $this->getMockBuilder(ChatbotHandler::class)
            ->setConstructorArgs(['dummy_api_key'])
            ->onlyMethods(['getReply'])
            ->getMock();
    }

    public function testGetReplySuccess() {
        $this->chatbot->method('getReply')->willReturn('Halo, ini balasan chatbot.');

        $response = $this->chatbot->getReply('Halo');
        $this->assertEquals('Halo, ini balasan chatbot.', $response);
    }

    public function testGetReplyFailure() {
        $this->chatbot->method('getReply')->willReturn('Gagal mendapatkan respon.');

        $response = $this->chatbot->getReply('');
        $this->assertEquals('Gagal mendapatkan respon.', $response);
    }
}
