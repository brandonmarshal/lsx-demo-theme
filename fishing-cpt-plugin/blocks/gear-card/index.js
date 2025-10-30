import { useEntityProp } from '@wordpress/core-data';
import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import './style.css';
import './editor.css';

export default function Edit({ context }) {
    const postId = context.postId;
    const [meta] = useEntityProp('postType', 'gear', 'meta', postId);
    const brand = meta?.brand;
    const gearType = meta?.gear_type;
    const price = meta?.price;
    return (
        <div {...useBlockProps()} className="gear-card-block">
            <strong>{__('Gear Card', 'fishing-cpt-plugin')}</strong>
            <ul>
                <li>
                    {__('Brand:', 'fishing-cpt-plugin')} {brand || '—'}
                </li>
                <li>
                    {__('Type:', 'fishing-cpt-plugin')} {gearType || '—'}
                </li>
                <li>
                    {__('Price:', 'fishing-cpt-plugin')} {price || '—'}
                </li>
            </ul>
        </div>
    );
}
