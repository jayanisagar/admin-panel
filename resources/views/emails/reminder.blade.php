<div style="height:100%;margin:0;padding:0;width:100%;background-color:#fafafa">
    <center>
        <h2>Reminder</h2>
        <table align="center" border="1" cellpadding="0" cellspacing="0" height="100%" width="100%"
               id="m_-6831175462299806915m_-4649296880075420708bodyTable"
               style="border-collapse:collapse;height:100%;margin:0;padding:0;width:100%;background-color:#fafafa">
            <tbody>
            <tr style="text-align: center; font-size: 20px;">
                <td> Name </td>
                <td> {{ $reminder->name }}</td>
            </tr>
            <tr style="text-align: center; font-size: 20px;">
                <td> Email </td>
                <td> {{ $reminder->email }}</td>
            </tr>
            <tr style="text-align: center; font-size: 20px;">
                <td> Date </td>
                <td> {{ $reminder->date }}</td>
            </tr>
            <tr style="text-align: center; font-size: 20px;">
                <td> Time </td>
                <td> {{ $reminder->time }}</td>
            </tr>
        </table>
    </center>
</div>
