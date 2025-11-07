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
    const fishFacts = meta?.fish_quick_facts || [];

    // Filter valid facts for preview
    const validFacts = Array.isArray(fishFacts) 
        ? fishFacts.filter(fact => fact?.fact_label && fact?.fact_value)
        : [];

    const renderPreview = () => {
        if (postType !== 'fish') {
            return (
                <p className="notice">
                    {__(
                        'This block displays fish quick facts. Add it to a Fish post to see the data.',
                        'fishing-cpt-plugin'
                    )}
                </p>
            );
        }

        if (!meta) {
            return <Spinner />;
        }

        if (validFacts.length === 0) {
            return (
                <p className="info">
                    {__(
                        'No quick facts added yet. Add them in the post sidebar to see a preview.',
                        'fishing-cpt-plugin'
                    )}
                </p>
            );
        }

        // Render preview based on display style
        switch (displayStyle) {
            case 'table':
                return (
                    <table className="fishing-fish-facts__table">
                        <thead>
                            <tr>
                                <th>{__('Fact', 'fishing-cpt-plugin')}</th>
                                <th>{__('Details', 'fishing-cpt-plugin')}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {validFacts.map((fact, index) => (
                                <tr key={index}>
                                    <td><strong>{fact.fact_label}</strong></td>
                                    <td>{fact.fact_value}</td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                );

            case 'cards':
                return (
                    <div className="fishing-fish-facts__cards">
                        {validFacts.map((fact, index) => (
                            <div key={index} className="fishing-fish-facts__card">
                                <h4 className="fishing-fish-facts__label">{fact.fact_label}</h4>
                                <div className="fishing-fish-facts__value">{fact.fact_value}</div>
                            </div>
                        ))}
                    </div>
                );

            case 'list':
            default:
                return (
                    <dl className="fishing-fish-facts__list">
                        {validFacts.map((fact, index) => (
                            <div key={index}>
                                <dt className="fishing-fish-facts__label">{fact.fact_label}</dt>
                                <dd className="fishing-fish-facts__value">{fact.fact_value}</dd>
                            </div>
                        ))}
                    </dl>
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
                                label: __('List', 'fishing-cpt-plugin'),
                                value: 'list',
                            },
                            {
                                label: __('Table', 'fishing-cpt-plugin'),
                                value: 'table',
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
                <div className="fishing-fish-facts-block">
                    <strong>
                        {__('Fish Quick Facts', 'fishing-cpt-plugin')} (
                        {displayStyle})
                    </strong>
                    {renderPreview()}
                </div>
            </div>
        </>
    );
}
