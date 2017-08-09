/**
 * Created by Steven on 3/26/2017.
 */

function show(current, hidden)
{
    document.getElementById(current).style.display='block';
    document.getElementById(hidden).style.display='none';
    return false;
}

function toggle(comments)
{
    var all = document.getElementById(comments);
    if ( all.style.display != 'none' ) { all.style.display = 'none'; }
    else { all.style.display = ''; }
    return false;
}
