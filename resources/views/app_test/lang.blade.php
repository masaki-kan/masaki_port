@if($data->lang === 0)
<p>HTML</p>
@elseif( $data->lang === 1 )
<p>CSS</p>
@elseif( $data->lang === 2 )
<p>SCSS</p>
@elseif( $data->lang === 3 )
<p>PHP</p>
@elseif( $data->lang === 4 )
<p>Javascript</p>
@elseif( $data->lang === 5 )
<p>Ruby on Lails</p>
@endif
