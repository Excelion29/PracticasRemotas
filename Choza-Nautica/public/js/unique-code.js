<script src="https://cdnjs.cloudflare.com/ajax/libs/node-uuid/1.4.7/uuid.min.js"></script>

    var serial_maker = function ( ) {

        var prefix = '';
        var seq = 0;
        return {
            set_prefix: function (p) {
                prefix = String(p);
            },
            set_seq: function (s) {
                seq = s;
            },
            gensym: function ( ) {
                var result = prefix + seq;
                seq += 1;
                return result;
            }
        };
    };

    var seqer = serial_maker( );
    seqer.set_prefix('Q');
    seqer.set_seq(1000);
    var unique = seqer.gensym( ); // unique is "Q1000"
    console.log('unique: '+seqer.gensym( ));