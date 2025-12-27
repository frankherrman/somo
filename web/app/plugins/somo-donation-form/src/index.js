import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { TextControl, PanelBody } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import metadata from '../block.json';

function Edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps();

    return (
        <div {...blockProps}>
            <InspectorControls>
                <PanelBody title={__('Settings', 'somo-donation-form')}>
                    <TextControl
                        label={__('Recipient Email', 'somo-donation-form')}
                        value={attributes.recipientEmail}
                        onChange={(val) => setAttributes({ recipientEmail: val })}
                        help={__('Email address where donations will be sent.', 'somo-donation-form')}
                    />
                    <TextControl
                        label={__('IBAN Number', 'somo-donation-form')}
                        value={attributes.iban}
                        onChange={(val) => setAttributes({ iban: val })}
                    />
                </PanelBody>
            </InspectorControls>
            <div className="somo-donation-form-editor">
                <h3>Donation Form Placeholder</h3>
                <p>Recipient: {attributes.recipientEmail}</p>
                <p>IBAN: {attributes.iban}</p>
                <p><em>Form will be rendered on frontend.</em></p>
            </div>
        </div>
    );
}

registerBlockType(metadata.name, {
    edit: Edit,
    save: () => null,
});
