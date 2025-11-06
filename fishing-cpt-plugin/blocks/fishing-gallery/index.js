import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, RangeControl, ToggleControl, SelectControl } from '@wordpress/components';
import { __, sprintf } from '@wordpress/i18n';
import { useSelect } from '@wordpress/data';
import './style.css';
import './editor.css';

/**
 * Edit component for Fishing Gallery block.
 *
 * Displays gallery preview in the editor with controls for customization.
 *
 * @param {Object} props - Block properties.
 * @param {Object} props.attributes - Block attributes.
 * @param {Function} props.setAttributes - Function to update attributes.
 * @param {Object} props.context - Block context including postId.
 * @return {JSX.Element} The block edit interface.
 */
export default function Edit({ attributes, setAttributes, context }) {
    const { columns, lightbox, captions, imageSize } = attributes;
    const postId = context.postId || 0;

    // Fetch gallery images from ACF field
    const gallery = useSelect(
        (select) => {
            if (!postId) return [];
            
            const record = select('core').getEditedEntityRecord('postType', context.postType, postId);
            const meta = record && record.meta ? record.meta : null;
            
            if (!meta || !meta.fishing_gallery) return [];
            
            // fishing_gallery might be a JSON string or already parsed
            try {
                const galleryData = typeof meta.fishing_gallery === 'string' 
                    ? JSON.parse(meta.fishing_gallery) 
                    : meta.fishing_gallery;
                
                return Array.isArray(galleryData) ? galleryData : [];
            } catch (e) {
                return [];
            }
        },
        [postId, context.postType]
    );

    const blockProps = useBlockProps({
        className: `fishing-gallery fishing-gallery--columns-${columns}`,
    });

    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Gallery Settings', 'fishing-cpt-plugin')} initialOpen={true}>
                    <RangeControl
                        label={__('Columns', 'fishing-cpt-plugin')}
                        value={columns}
                        onChange={(value) => setAttributes({ columns: value })}
                        min={1}
                        max={6}
                        help={__('Number of columns in the gallery grid.', 'fishing-cpt-plugin')}
                    />
                    <SelectControl
                        label={__('Image Size', 'fishing-cpt-plugin')}
                        value={imageSize}
                        options={[
                            { label: __('Thumbnail', 'fishing-cpt-plugin'), value: 'thumbnail' },
                            { label: __('Medium', 'fishing-cpt-plugin'), value: 'medium' },
                            { label: __('Large', 'fishing-cpt-plugin'), value: 'large' },
                            { label: __('Full Size', 'fishing-cpt-plugin'), value: 'full' },
                        ]}
                        onChange={(value) => setAttributes({ imageSize: value })}
                    />
                    <ToggleControl
                        label={__('Enable Lightbox', 'fishing-cpt-plugin')}
                        checked={lightbox}
                        onChange={(value) => setAttributes({ lightbox: value })}
                        help={__('Allow images to be viewed in a lightbox overlay.', 'fishing-cpt-plugin')}
                    />
                    <ToggleControl
                        label={__('Show Captions', 'fishing-cpt-plugin')}
                        checked={captions}
                        onChange={(value) => setAttributes({ captions: value })}
                        help={__('Display image captions below each image.', 'fishing-cpt-plugin')}
                    />
                </PanelBody>
            </InspectorControls>

            <div {...blockProps}>
                <div className="fishing-gallery__header">
                    <h3>{__('Fishing Gallery', 'fishing-cpt-plugin')}</h3>
                    <p className="fishing-gallery__description">
                        {gallery.length > 0
                            ? sprintf(__('%d images in gallery', 'fishing-cpt-plugin'), gallery.length)
                            : __('No images added yet. Add images using the Gallery field below.', 'fishing-cpt-plugin')}
                    </p>
                </div>

                {gallery.length > 0 && (
                    <div 
                        className="fishing-gallery__grid"
                        style={{ gridTemplateColumns: `repeat(${columns}, 1fr)` }}
                    >
                        {gallery.slice(0, 6).map((image, index) => (
                            <div key={image.id || index} className="fishing-gallery__item">
                                <img
                                    src={image.sizes && image.sizes.medium ? image.sizes.medium : image.url}
                                    alt={image.alt || ''}
                                    className="fishing-gallery__image"
                                />
                                {captions && image.caption && (
                                    <p className="fishing-gallery__caption">{image.caption}</p>
                                )}
                            </div>
                        ))}
                        {gallery.length > 6 && (
                            <div className="fishing-gallery__more">
                                +{gallery.length - 6} {__('more', 'fishing-cpt-plugin')}
                            </div>
                        )}
                    </div>
                )}
            </div>
        </>
    );
}
