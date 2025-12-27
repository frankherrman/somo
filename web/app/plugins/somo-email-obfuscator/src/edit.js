import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { TextControl, PanelBody } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps();

    const onChangeEmail = (newEmail) => {
        setAttributes({ email: newEmail });
    };

    return (
        <div {...blockProps}>
            <InspectorControls>
                <PanelBody title={__('Settings', 'somo-email-obfuscator')}>
                    <TextControl
                        label={__('Email Address', 'somo-email-obfuscator')}
                        value={attributes.email}
                        onChange={onChangeEmail}
                        help={__('Enter the email address to obfuscate.', 'somo-email-obfuscator')}
                    />
                </PanelBody>
            </InspectorControls>
            <div className="somo-email-obfuscator-editor">
                <span>
                    {attributes.email ? attributes.email : __('Enter an email address in the settings sidebar.', 'somo-email-obfuscator')}
                </span>
            </div>
        </div>
    );
}
