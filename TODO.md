# TODO: Make Website Fully Responsive

## Plan Overview
The website currently has basic responsiveness with media queries at 1199px, 991px, and 767px. To make it fully responsive on all device types (phones, tablets, desktops, ultra-wide screens), we need to:

1. Add more breakpoints for finer control.
2. Make images responsive.
3. Adjust font sizes, paddings, and margins to scale with screen size.
4. Ensure proper stacking and layout on small screens.
5. Optimize for landscape orientations and large screens.

## Tasks
- [x] Add additional media query breakpoints (e.g., 1400px, 576px, 480px, 360px).
- [x] Make all images responsive (max-width: 100%, height: auto).
- [x] Adjust font sizes using relative units (rem, vw).
- [x] Scale paddings and margins for different screen sizes.
- [x] Ensure aside/sidebar behaves well on all sizes (overlay or adjust width).
- [x] Adjust flex layouts for better stacking on small screens.
- [ ] Test layout on various simulated devices.
- [ ] Fix any horizontal scroll issues.
- [x] Optimize for ultra-wide screens (increase max-width if needed).

## Files to Edit
- css/style.css: Primary file for responsiveness changes.

## Followup Steps
- Test the website in a browser using developer tools to simulate different devices.
- Check for any layout breaks or text overflow.
- Ensure navigation works on touch devices.
- Verify images load and scale properly.
