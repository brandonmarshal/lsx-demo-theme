import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import './style.css';
import './editor.css';

export default function Edit({ attributes, setAttributes, context }) {
    const { displayStyle } = attributes;
    const postType = context.postType;
    const blockProps = useBlockProps();

    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Display Settings', 'fishing-cpt-plugin')}>
                    <SelectControl
                        label={__('Display Style', 'fishing-cpt-plugin')}
                        value={displayStyle}
                        options={[
                            {
                                label: __('Table', 'fishing-cpt-plugin'),
                                value: 'table',
                            },
                            {
                                label: __('List', 'fishing-cpt-plugin'),
                                value: 'list',
                            },
                            {
                                label: __('Cards', 'fishing-cpt-plugin'),
                                value: 'cards',
                            },
                        ]}
                        onChange={(value) =>
                            setAttributes({ displayStyle: value })
                        }
                    />
                </PanelBody>
            </InspectorControls>
            <div {...blockProps}>
                <div className="fishing-gear-specs-block">
                    <strong>
                        {__('Gear Specifications', 'fishing-cpt-plugin')} (
                        {displayStyle})
                    </strong>
                    {postType !== 'gear' && (
                        <p className="notice">
                            {__(
                                'This block displays gear specifications. Add it to a Gear post to see the data.',
                                'fishing-cpt-plugin'
                            )}
                        </p>
                    )}
                    {postType === 'gear' && (
                        <p className="info">
                            {__(
                                'Specifications will be displayed here on the frontend.',
                                'fishing-cpt-plugin'
                            )}
                        </p>
                    )}
                </div>
            </div>
        </>
    );
}
