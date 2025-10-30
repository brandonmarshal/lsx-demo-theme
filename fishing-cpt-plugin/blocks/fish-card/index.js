import { useEntityProp } from '@wordpress/core-data';
import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import './style.css';
import './editor.css';

export default function Edit({ context }) {
    const postId = context.postId;
    const [meta] = useEntityProp('postType', 'fish', 'meta', postId);
    const waterType = meta?.water_type;
    const averageSize = meta?.average_size;
    const baitType = meta?.bait_type;
    return (
        <div {...useBlockProps()} className="fish-card-block">
            <strong>{__('Fish Card', 'fishing-cpt-plugin')}</strong>
            <ul>
                <li>
                    {__('Water:', 'fishing-cpt-plugin')} {waterType || '—'}
                </li>
                <li>
                    {__('Avg Size:', 'fishing-cpt-plugin')} {averageSize || '—'}
                </li>
                <li>
                    {__('Bait:', 'fishing-cpt-plugin')} {baitType || '—'}
                </li>
            </ul>
        </div>
    );
}
