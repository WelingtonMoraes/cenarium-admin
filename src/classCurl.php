<?php
class CurlPost
{
    private $url;
    private $options;

    /**
     * @param string $url     Request URL
     * @param array  $options cURL options
     */
    public function __construct($url, array $options = [])
    {
        $this->url = $url;
        $this->options = $options;
    }

    /**
     * Get the response
     * @return string
     * @throws \RuntimeException On cURL error
     */
    public function __invoke(array $post)
    {
        $ch = \curl_init($this->url);

        foreach ($this->options as $key => $val) {
            \curl_setopt($ch, $key, $val);
        }

        $headers = array(
            "Content-Type: application/json",
            "X-Content-Type-Options:nosniff",
            "Accept:application/json",
            "Cache-Control:no-cache",
            "Authorization: Bearer " . (empty($_SESSION['accessToken']) ? '' : $_SESSION['accessToken'])
        );

        \curl_setopt($ch, \CURLOPT_HTTPHEADER, $headers);
        \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, \CURLOPT_SAFE_UPLOAD, true);
        \curl_setopt($ch, \CURLOPT_POSTFIELDS, json_encode($post));

        $response = \curl_exec($ch);
        $error    = \curl_error($ch);
        $errno    = \curl_errno($ch);

        echo '<pre>';
        print_r($post);
        echo '</pre>';

        if (\is_resource($ch)) {
            \curl_close($ch);
        }

        if (0 !== $errno) {
            throw new \RuntimeException($error, $errno);
        }

        return $response;
    }
}

function getRequest($url)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => [
            "Accept: */*",
            "content-type: multipart/form-data",
            "Authorization: Bearer " . (empty($_SESSION['accessToken']) ? '' : $_SESSION['accessToken'])
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $array = json_decode($response);

    return $array;
}

function deleteRequest($url)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "DELETE",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => [
            "Accept: */*",
            "content-type: multipart/form-data",
            "Authorization: Bearer " . (empty($_SESSION['accessToken']) ? '' : $_SESSION['accessToken'])
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $array = json_decode($response);

    return $array;
}
