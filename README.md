WordpressTiles
==============

Simple WordPress plugin for "Metro" Style tiles with content

Here is example implmentation on page.  Note that it is important to setup your pages with content first and reference the page IDs for each block.

The structure is a page that will display all blocks with animation. And then a page for each block that is content.  Title is what shows up as block preview, and when block is clicked expanded to show all page content.

[box width="900px"]
  [box-column width="300px"]
  [box-post width="300px" height="300px" id="390" bgcolor="#c00000"]
  [box-post width="300px" height="300px" id="398" bgcolor="#ffd966"]
  
  [/box-column]
    [box-column width="300px"]
    [box-post width="300px" height="600px" id="397" bgcolor="#2e75b6"]
  [/box-column]
  
  [box-column width="300px"]
    [box-post width="300px" height="150px" id="396" bgcolor="#767171"]
    [box-post width="150px" height="150px" id="395" bgcolor="#ffc000"]
    [box-post width="150px" height="150px" id="394" bgcolor="#00b0f0"]
    [box-post width="300px" height="300px" id="393" bgcolor="#7030a0"]
  [/box-column]
[/box]

Known Issues:
- Pages with long content will bleed into body of page.
- Mobile devices expand ajax does not always work
