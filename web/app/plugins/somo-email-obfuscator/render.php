<?php
/**
 * Render callback for the Email Obfuscator block.
 *
 * @param array $attributes Block attributes.
 * @return string Rendered HTML.
 */

if (empty($attributes['email'])) {
    return '';
}

$email = $attributes['email'];
$obfuscated_email = antispambot($email);

// We can output a simple mailto link
// The antispambot function obfuscates characters to HTML entities.
// It is best used in the href and the body of the link.

// Double checking: antispambot() creates entities.
// e.g. f becomes &#102;
// If we put it in href="mailto:...", browsers handle entities in attributes mostly fine,
// but antispambot is specifically designed for the visible text. 
// However, WordPress codex examples often show:
// <a href="mailto:<?php echo antispambot( $email ); \?\>"><?php echo antispambot($email); \?\></a>

// Let's return the markup.
// We use 'wrapper_attributes' if we want to support block supports (alignment etc),
// but we just return a simple link for now or wrap it.
// Dynamic blocks usually use get_block_wrapper_attributes().

$wrapper_attributes = get_block_wrapper_attributes();

printf(
    '<div %1$s><a href="mailto:%2$s">%2$s</a></div>',
    $wrapper_attributes,
    $obfuscated_email
);