<?php
return [

    'required' => ':attributeは必須項目です。',
    'email' => ':attributeは正しいメールアドレス形式である必要があります。',
    'unique' => '入力された:attributeはすでに使用されています。',
    'min' => [
        'numeric' => ':attributeは少なくとも:minである必要があります。',
        'file' => ':attributeは少なくとも:minキロバイトである必要があります。',
        'string' => ':attributeは少なくとも:min文字である必要があります。',
        'array' => ':attributeは少なくとも:min個の項目を含む必要があります。',
    ],
    'confirmed' => ':attributeの確認が一致しません。',

    'attributes' => [
        'email' => 'メールアドレス',
        'password' => 'パスワード',
    ],
];
