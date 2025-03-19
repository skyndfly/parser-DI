<?php
namespace app;
use DomainException;

class Parser
{
    private array $data;
    private array $result = [];
    public static ?self $instance = null;
    private function __construct(array $data)
    {
        $this->data = $data;
    }
    public static function getInstance(array $data): self
    {
        if (self::$instance === null) {
            self::$instance = new self($data);
        }
        return self::$instance;
    }
    public function execute(): void
    {
        if (!isset($this->data['aaData'] )){
            throw new DomainException('Файл поврежден ключ aaData не существует');
        }
        $this->setHeader();
        foreach ($this->data['aaData'] as $item) {
            if ($item[4] === 'Луганская Народная Республика'){
                $this->result[] = $item;
            }
        }
    }
    public function getResult(): array {
        return $this->result;
    }
    private function setHeader(): void
    {
        $this->result[] = [
            '№ п/п',
            'Позывной',
            'ФИО',
            'Номер',
            'РО',
            'Прочие позывные',
        ];
    }
}