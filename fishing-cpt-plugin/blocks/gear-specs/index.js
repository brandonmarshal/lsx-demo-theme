import { useEntityProp } from '@wordpress/core-data';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl, Spinner } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import './style.css';
import './editor.css';

export default function Edit({ attributes, setAttributes, context }) {
    const { displayStyle } = attributes;
    const postId = context.postId;
    const postType = context.postType;
    const blockProps = useBlockProps();

    // Fetch meta data for live preview
    const [meta] = useEntityProp('postType', postType, 'meta', postId);
    const gearSpecs = meta?.gear_specs || [];

    // Filter valid specs and prepare display values for preview
    const validSpecs = Array.isArray(gearSpecs)
        ? gearSpecs
              .filter(spec => spec?.spec_name && spec?.spec_value)
              .map(spec => ({
                  name: spec.spec_name,
                  value: spec.spec_value + (spec.spec_unit ? ' ' + spec.spec_unit : ''),
              }))
        : [];

    const renderPreview = () => {
        if (postType !== 'gear') {
            return (
                <p className="notice">
                    {__(
                        'This block displays gear specifications. Add it to a Gear post to see the data.',
                        'fishing-cpt-plugin'
                    )}
                </p>
            );
        }

        if (!meta) {
            return <Spinner />;
        }

        if (validSpecs.length === 0) {
            return (
                <p className="info">
                    {__(
                        'No specifications added yet. Add them in the post sidebar to see a preview.',
                        'fishing-cpt-plugin'
                    )}
                </p>
            );
        }

        // Render preview based on display style
        switch (displayStyle) {
            case 'list':
                return (
                    <dl className="fishing-gear-specs__list">
                        {validSpecs.map((spec, index) => (
                            <div key={index}>
                                <dt className="fishing-gear-specs__label">{spec.name}</dt>
                                <dd className="fishing-gear-specs__value">{spec.value}</dd>
                            </div>
                        ))}
                    </dl>
                );

            case 'cards':
                return (
                    <div className="fishing-gear-specs__cards">
                        {validSpecs.map((spec, index) => (
                            <div key={index} className="fishing-gear-specs__card">
                                <h4 className="fishing-gear-specs__label">{spec.name}</h4>
                                <div className="fishing-gear-specs__value">{spec.value}</div>
                            </div>
                        ))}
                    </div>
                );

            case 'table':
            default:
                return (
                    <table className="fishing-gear-specs__table">
                        <thead>
                            <tr>
                                <th>{__('Specification', 'fishing-cpt-plugin')}</th>
                                <th>{__('Value', 'fishing-cpt-plugin')}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {validSpecs.map((spec, index) => (
                                <tr key={index}>
                                    <td><strong>{spec.name}</strong></td>
                                    <td>{spec.value}</td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                );
        }
    };

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
                    {renderPreview()}
                </div>
            </div>
        </>
    );
}
