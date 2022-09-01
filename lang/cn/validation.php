<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted" => "您必须接受 :attribute。",
    "accepted_if" => "当 :other 为 :value 时，必须接受 :attribute。",
    "active_url" => ":Attribute 不是一个有效的网址。",
    "after" => ":Attribute 必须要晚于 :date。",
    "after_or_equal" => ":Attribute 必须要等于 :date 或更晚。",
    "alpha" => ":Attribute 只能由字母组成。",
    "alpha_dash" => ":Attribute 只能由字母、数字、短划线(-)和下划线(_)组成。",
    "alpha_num" => ":Attribute 只能由字母和数字组成。",
    "array" => ":Attribute 必须是一个数组。",
    'before' => ':Attribute 必须要早于 :date。',
    'before_or_equal' => ':Attribute 必须要等于 :date 或更早。',
    'between' => [
        'array' => ':Attribute 必须只有 :min - :max 个单元。',
        'file' => ':Attribute 必须介于 :min - :max KB 之间。',
        'numeric' => ':Attribute 必须介于 :min - :max 之间。',
        'string' => ':Attribute 必须介于 :min - :max 个字符之间。',
    ],
    "boolean" => ":Attribute 必须为布尔值。",
    "confirmed" => ":Attribute 两次输入不一致。",
    "current_password" => "密码错误。",
    "date" => ":Attribute 不是一个有效的日期。",
    "date_equals" => ":Attribute 必须要等于 :date。",
    "date_format" => ":Attribute 的格式必须为 :format。",
    "declined" => ":Attribute 必须是拒绝的。",
    "declined_if" => "当 :other 为 :value 时字段 :attribute 必须是拒绝的。",
    "different" => ":Attribute 和 :other 必须不同。",
    "digits" => ":Attribute 必须是 :digits 位数字。",
    "digits_between" => ":Attribute 必须是介于 :min 和 :max 位的数字。",
    "dimensions" => ":Attribute 图片尺寸不正确。",
    "distinct" => ":Attribute 已经存在。",
    "doesnt_end_with" =>
    "The :attribute may not end with one of the following: :values.",
    "doesnt_start_with" =>
    "The :attribute may not start with one of the following: :values.",
    "email" => ":Attribute 不是一个合法的邮箱。",
    "ends_with" => ":Attribute 必须以 :values 为结尾。",
    "enum" => ":Attribute 值不正确。",
    "exists" => ":Attribute 不存在。",
    "file" => ":Attribute 必须是文件。",
    "filled" => ":Attribute 不能为空。",
    'gt' => [
        "array" => ":Attribute 必须多于 :value 个元素。",
        "file" => ":Attribute 必须大于 :value KB。",
        "numeric" => ":Attribute 必须大于 :value。",
        "string" => ":Attribute 必须多于 :value 个字符。",
    ],
    'gte' => [
        "array" => ":Attribute 必须多于或等于 :value 个元素。",
        "file" => ":Attribute 必须大于或等于 :value KB。",
        "numeric" => ":Attribute 必须大于或等于 :value。",
        "string" => ":Attribute 必须多于或等于 :value 个字符。",
    ],
    "image" => ":Attribute 必须是图片。",
    "in" => "已选的属性 :attribute 无效。",
    "in_array" => ":Attribute 必须在 :other 中。",
    "integer" => ":Attribute 必须是整数。",
    "ip" => ":Attribute 必须是有效的 IP 地址。",
    "ipv4" => ":Attribute 必须是有效的 IPv4 地址。",
    "ipv6" => ":Attribute 必须是有效的 IPv6 地址。",
    "json" => ":Attribute 必须是正确的 JSON 格式。",
    'lt' => [
        "array" => ":Attribute 必须少于 :value 个元素。",
        "file" => ":Attribute 必须小于 :value KB。",
        "numeric" => ":Attribute 必须小于 :value。",
        "string" => ":Attribute 必须少于 :value 个字符。",
    ],
    'lte' => [
        "array" => ":Attribute 必须少于或等于 :value 个元素。",
        "file" => ":Attribute 必须小于或等于 :value KB。",
        "numeric" => ":Attribute 必须小于或等于 :value。",
        "string" => ":Attribute 必须少于或等于 :value 个字符。",
    ],
    "mac_address" => ":Attribute 必须是一个有效的 MAC 地址。",
    'max' => [
        "array" => ":Attribute 最多只有 :max 个单元。",
        "file" => ":Attribute 不能大于 :max KB。",
        "numeric" => ":Attribute 不能大于 :max。",
        "string" => ":Attribute 不能大于 :max 个字符。",
    ],
    "mimes" => ":Attribute 必须是一个 :values 类型的文件。",
    "mimetypes" => ":Attribute 必须是一个 :values 类型的文件。",
    'min' => [
        "array" => ":Attribute 至少有 :min 个单元。",
        "file" => ":Attribute 大小不能小于 :min KB。",
        "numeric" => ":Attribute 必须大于等于 :min。",
        "string" => ":Attribute 至少为 :min 个字符。",
    ],
    "multiple_of" => ":Attribute 必须是 :value 中的多个值。",
    "not_in" => "已选的属性 :attribute 非法。",
    "not_regex" => ":Attribute 的格式错误。",
    "numeric" => ":Attribute 必须是一个数字。",
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    "present" => ":Attribute 必须存在。",
    "previous" => "&laquo; 上一页",
    "prohibited" => ":Attribute 字段被禁止。",
    "prohibited_if" => "当 :other 为 :value 时，禁止 :attribute 字段。",
    "prohibited_unless" =>
    ":Attribute 字段被禁止，除非 :other 位于 :values 中。",
    "prohibits" => ":Attribute 字段禁止出现 :other。",
    "regex" => ":Attribute 格式不正确。",
    "required" => ":Attribute 不能为空。",
    "required_array_keys" => ":Attribute 至少包含指定的键：:values.",
    "required_if" => "当 :other 为 :value 时 :attribute 不能为空。",
    "required_unless" => "当 :other 不为 :values 时 :attribute 不能为空。",
    "required_with" => "当 :values 存在时 :attribute 不能为空。",
    "required_with_all" => "当 :values 存在时 :attribute 不能为空。",
    "required_without" => "当 :values 不存在时 :attribute 不能为空。",
    "required_without_all" => "当 :values 都不存在时 :attribute 不能为空。",
    "same" => ":Attribute 和 :other 必须相同。",
    'size' => [
        "array" => ":Attribute 必须为 :size 个单元。",
        "file" => ":Attribute 大小必须为 :size KB。",
        "numeric" => ":Attribute 大小必须为 :size。",
        "string" => ":Attribute 必须是 :size 个字符。",
    ],
    "starts_with" => ":Attribute 必须以 :values 为开头。",
    "string" => ":Attribute 必须是一个字符串。",
    "timezone" => ":Attribute 必须是一个合法的时区值。",
    "unique" => ":Attribute 已经存在。",
    "uploaded" => ":Attribute 上传失败。",
    "url" => ":Attribute 格式不正确。",
    "uuid" => ":Attribute 必须是有效的 UUID。",
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
