<?php


namespace BoolXY\Trendyol;

class Client extends \GuzzleHttp\Client
{
    private string $base_uri;

    private string $user;

    private string $pass;

    private string $supplier_id;

    public function __construct(string $user, string $pass, string $supplier_id)
    {
        $this->base_uri = getenv("TRENDYOL_BASE_URI");
        $this->user = $user;
        $this->pass = $pass;
        $this->supplier_id = $supplier_id;

        parent::__construct([
            "base_uri" => $this->base_uri,
            "auth" => [$this->user, $this->pass],
        ]);
    }

    /**
     * @return string
     */
    public function getBaseUri(): string
    {
        return $this->base_uri;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * @return string
     */
    public function getSupplierId(): string
    {
        return $this->supplier_id;
    }
}
