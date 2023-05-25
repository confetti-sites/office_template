@if(request()->cookie('state') !== request()->parameter('state'))
    <div class="flex items-center justify-center w-full h-screen bg-gray-50 dark:bg-gray-900">
        Error: The state parameter is not the same as the cookie state. Please try again.
    </div>
@else
    @php
        $response = (new \Confetti\Helpers\Client())->get('auth:8080/auth/callback?code=' . request()->parameter('code'));
        try {
            $contents = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }

        $accessToken = $contents['auth']['access_token'];
        setcookie('access_token', $accessToken, [
            'expires' => (new DateTimeImmutable('now + 10 hours'))->format(DateTimeInterface::RFC7231),
            'path' => '/',
        ]);
        $redirectAfterLogin = request()->cookie('redirect_after_login') ?? '/';
        // Clear cookie
        setcookie('redirect_after_login', '', [
            'expires' => (new DateTimeImmutable('now - 1 hour'))->format(DateTimeInterface::RFC7231),
            'path' => '/',
        ]);
        header('Location: ' . $redirectAfterLogin);
    @endphp
@endif
